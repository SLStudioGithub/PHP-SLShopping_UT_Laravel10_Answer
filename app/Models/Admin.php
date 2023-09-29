<?php

namespace App\Models;

use App\Exceptions\NotFoundException;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Consts\PageConsts;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * 管理者情報モデル
 */
class Admin extends Authenticatable
{
    use Notifiable;
    use HasFactory;

    /**
     * テーブル名
     *
     * @var string
     */
    protected $table = 'admins';

    /**
     * テーブルの主キー
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * 複数代入する属性
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'name',
        'avatar',
    ];

    /**
     * admin_rolesとの多対多リレーション定義
     *
     * @return BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_admins', 'user_id', 'role_id');
    }

    /**
     * admin_permissionsとの多対多リレーション定義
     *
     * @return BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission', 'admin_permissions', 'user_id', 'permission_id');
    }

    /**
     * 管理者の役割を全件取得する
     *
     * @return Collection
     */
    public function getAllRoles()
    {
        return Role::all();
    }

    /**
     * 管理者権限を全件取得する
     *
     * @return Collection
     */
    public function getAllPermissions()
    {
        return Permission::all();
    }

    /**
     * 管理者の検索と取得
     *
     * @param string|null $userId
     * @param string|null $userName
     * @param array|null $roleIds
     * @param array|null $permissionIds
     * @return LengthAwarePaginator
     */
    public function search($userId, $userName, $roleIds, $permissionIds)
    {
        // 役割IDがない場合は全役割を検索条件とする
        $roleIds = $roleIds ? $roleIds : $this->getAllRoles()
            ->map(function (Role $role) {
                return $role->id;
            })
            ->toArray();
        // 権限IDがない場合は全権限を検索条件とする
        $permissionIds = $permissionIds ? $permissionIds : $this->getAllPermissions()
            ->map(function (Permission $permission) {
                return $permission->id;
            })
            ->toArray();
        return $this->fetch(
            $userId,
            $userName,
            $roleIds,
            $permissionIds
        );
    }

    /**
     * adminsテーブルで検索と取得
     *
     * @param string|null $userId
     * @param string|null $userName
     * @param array $roleIds
     * @param array $permissionIds
     * @return LengthAwarePaginator
     */
    public function fetch($userId, $userName, $roleIds, $permissionIds)
    {
        $admins = Admin::query()
            ->where('email', 'like', "%$userId%") // 管理者IDはあいまい検索
            ->where('name', 'like', "%$userName%") // 管理者名はあいまい検索
            ->whereHas('roles', function ($query) use ($roleIds) {
                // 役割IDは複数検索
                $query->whereIn('id', $roleIds);
            })
            ->whereHas('permissions', function ($query) use ($permissionIds) {
                // 権限IDは複数検索
                $query->whereIn('id', $permissionIds);
            })
            ->paginate(PageConsts::ADMIN_NUMBER_OF_PER_PAGE); // 1ページあたり20件表示
        return $admins;
    }

    /**
     * 管理者の新規作成
     *
     * @param string $userId
     * @param string $userName
     * @param string $password
     * @param array $roleIds
     * @param array $permissionIds
     * @return Admin
     */
    public function createAdmin($userId, $userName, $password, $roleIds, $permissionIds)
    {
        $admin = new Admin([
            'email' => $userId,
            'name' => $userName,
            'password' => bcrypt($password)
        ]);
        // DB永続化処理
        $admin = $this->saveAll(
            $admin,
            $roleIds,
            $permissionIds
        );
        return $admin;
    }

    /**
     * admin_usersテーブルデータ更新
     *
     * @param Admin $admin
     * @param array $roleIds
     * @param array $permissionIds
     * @return Admin
     */
    public function saveAll($admin, $roleIds, $permissionIds)
    {
        return DB::transaction(function () use ($admin, $roleIds, $permissionIds) {
            // adminsテーブルに上書き情報永続化
            $admin->save();
            // admin_rolesにデータのdelete＆insert
            $admin->roles()->sync($roleIds);
            // admin_permissionsにデータのdelete＆insert
            $admin->permissions()->sync($permissionIds);
            return $admin;
        });
    }

    /**
     * 管理者詳細情報を取得
     *
     * @param integer $id
     * @throws NotFoundException
     * @return Admin
     */
    public function findById($id)
    {
        if (!$this->exists($id)) {
            throw new NotFoundException($id, $this->getTable());
        }
        // 管理者の取得
        $admin = Admin::find($id);
        return $admin;
    }

    /**
     * 管理者情報を更新
     *
     * @param integer $id
     * @param string $userId
     * @param string $userName
     * @param array $roleIds
     * @param array $permissionIds
     * @return Admin
     */
    public function edit($id, $userId, $userName, $roleIds, $permissionIds)
    {
        // 管理者情報の取得
        $admin = $this->findById($id);
        $admin->email = $userId;
        $admin->name = $userName;
        return $this->saveAll(
            $admin,
            $roleIds,
            $permissionIds
        );
    }

    /**
     * 管理者の削除
     *
     * @param integer $id
     * @return Admin
     */
    public function deleteById($id)
    {
        if (!$this->exists($id)) {
            throw new NotFoundException($id, $this->getTable());
        }
        // 管理者情報の取得
        $admin = $this->findById($id);
        $this->deleteAll($admin);
        return $admin;
    }

    /**
     * admin_usersテーブルからデータ削除
     *
     * @param Admin $admin
     * @return void
     */
    public function deleteAll($admin)
    {
        DB::transaction(function () use ($admin) {
            // admin_permissionsテーブルのデータ削除
            $admin->roles()->detach();
            // admin_rolesテーブルのデータ削除
            $admin->permissions()->detach();
            // adminsテーブルのデータ削除
            $admin->delete();
        });
    }

    /**
     * 管理者の存在チェック
     *
     * @param integer $id
     * @return boolean
     */
    public function exists($id)
    {
        if (Admin::whereId($id)->count() == 0) {
            return false;
        }
        return true;
    }

    /**
     * 管理者メールアドレスの重複チェック
     *
     * @param Admin $admin
     * @return boolean
     */
    public function checkUnique($admin)
    {
        $isCreatingNew = ($admin->id == null || $admin->id == 0);
        $adminByEmail = Admin::whereEmail($admin->email)->get();
        if ($isCreatingNew) {
            if ($adminByEmail->isNotEmpty()) {
                return false;
            }
        } else {
            if ($adminByEmail->isNotEmpty() && $adminByEmail->id != $admin->id) {
                return false;
            }
        }
        return true;
    }
}