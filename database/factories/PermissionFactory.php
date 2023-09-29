<?php

namespace Database\Factories;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class PermissionFactory extends Factory
{

    /**
     * ファクトリに対応するモデル名
     *
     * @var string
     */
    protected $model = Permission::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => 1,
            'name' => 'All permission',
            'slug' => '*',
            'http_method' => '',
            'http_path' => '*',
        ];
    }
}
