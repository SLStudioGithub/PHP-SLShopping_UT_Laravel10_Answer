<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 管理者役割情報中間モデル
 */
class RoleAdmin extends Model
{
    use HasFactory;
    /**
     * テーブル名
     *
     * @var string
     */
    protected $table = 'role_admins';

    /**
     * 複数代入する属性
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'user_id',
    ];
}
