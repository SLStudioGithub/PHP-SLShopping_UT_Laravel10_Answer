<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * 管理者権限情報中間モデル
 */
class AdminPermission extends Model
{
    use HasFactory;

    /**
     * テーブル名
     *
     * @var string
     */
    protected $table = 'admin_permissions';

    /**
     * 複数代入する属性
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'permission_id',
    ];
}
