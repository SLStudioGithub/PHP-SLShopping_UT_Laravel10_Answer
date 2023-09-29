<?php

namespace Database\Factories;

use App\Models\AdminPermission;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminPermissionFactory extends Factory
{

    /**
     * ファクトリに対応するモデル名
     *
     * @var string
     */
    protected $model = AdminPermission::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'permission_id' => 1,
        ];
    }
}
