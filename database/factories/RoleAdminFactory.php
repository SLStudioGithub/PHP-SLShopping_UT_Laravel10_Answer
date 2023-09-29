<?php

namespace Database\Factories;

use App\Models\RoleAdmin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class RoleAdminFactory extends Factory
{

    /**
     * ファクトリに対応するモデル名
     *
     * @var string
     */
    protected $model = RoleAdmin::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'role_id' => 1,
            'user_id' => 1,
        ];
    }
}
