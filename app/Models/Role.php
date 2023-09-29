<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 管理者役割情報モデル
 */
class Role extends Model
{
    use HasFactory;
    /**
     * テーブル名
     *
     * @var string
     */
    protected $table = 'roles';

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
        'name',
        'slug',
    ];
}
