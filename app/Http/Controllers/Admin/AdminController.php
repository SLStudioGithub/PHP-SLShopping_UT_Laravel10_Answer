<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\http\Requests\AdminRequest;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;



/**
 * 管理者画面コントローラー
 *
 * 管理者画面の処理について一括で管理する。
 */
class AdminController extends Controller
{
    /**
     * 管理者ユーザーモデル
     *
     * @var Admin $admin
     */
    private $admin;

    /**
     * コンストラクタ
     */
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    /**
     * 管理者一覧＆検索画面
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        // 検索条件用に全役割を取得
        $roles = $this->admin->getAllRoles();
        // 検索条件用に全権限を取得
        $permissions = $this->admin->getAllPermissions();
        // 管理者を検索
        $admins = $this->admin->search(
            $request->adminId,
            $request->adminName,
            $request->adminRoles,
            $request->adminPermissions
        );
        return view('admin.index', compact('admins', 'roles', 'permissions'));
    }

    /**
     * 管理者新規登録画面
     *
     * @return View
     */
    public function showCreate()
    {
        // 登録フォーム用に全役割を取得
        $roles = $this->admin->getAllRoles();
        // 登録フォーム用に全権限を取得
        $permissions = $this->admin->getAllPermissions();
        return view('admin.create', compact('roles', 'permissions'));
    }

    /**
     * 管理者新規登録
     *
     * @param AdminUserRequest $request
     * @return RedirectResponse
     */
    public function create(AdminRequest $request)
    {
        // 管理者を新規登録＆取得
        $admin = $this->admin->createAdmin(
            $request->userId,
            $request->userName,
            $request->password,
            $request->adminRoles,
            $request->adminPermissions
        );
        // 新規登録した管理者詳細にリダイレクトする
        return redirect()
            ->route('admin.detail', ['id' => $admin->id])
            ->with('completeFlg', true);
            
    }

    /**
     * 管理者詳細画面
     *
     * @param integer $id
     * @return View
     */
    public function detail($id)
    {
        // 管理者詳細情報を取得
        $admin = $this->admin->findById($id);
        return view('admin.detail', compact('admin'));
    }

    /**
     * 管理者編集画面
     *
     * @param integer $id
     * @return View
     */
    public function showEdit($id)
    {
        // フォーム用に全役割を取得
        $roles = $this->admin->getAllRoles();
        // フォーム用に全権限を取得
        $permissions = $this->admin->getAllPermissions();
        // 管理者詳細情報を取得
        $admin = $this->admin->findById($id);
        return view('admin.edit', compact('admin', 'roles', 'permissions'));
    }

    /**
     * 管理者編集
     *
     * @param integer $id
     * @param AdminRequest $request
     * @return RedirectResponse
     */
    public function edit($id, AdminRequest $request)
    {
        // 管理者を編集
        $admin = $this->admin->edit(
            $id,
            $request->userId,
            $request->userName,
            $request->adminRoles,
            $request->adminPermissions
        );


        // 編集した管理者詳細にリダイレクトする
        return redirect()
            ->route('admin.detail', ['id' => $admin->id])
            ->with('completeFlg', true);
    }

    /**
     * 管理者の削除
     *
     * @param integer $id
     * @return RedirectResponse
     */
    public function delete($id)
    {
        $admin = $this->admin->deleteById($id);
        // 一覧画面へ遷移
        return redirect()->route('admin.index')->with('message', "{$admin->name}を削除しました");
    }
}