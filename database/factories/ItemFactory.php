<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class ItemFactory extends Factory
{

    /**
     * ファクトリに対応するモデル名
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => 1,
            'name' => 'ダミーデータ',
            'description' => fake()->unique()->realText(50),
            'price' => 1000,
            'brand_id' => Brand::factory()->create(),
            'category_id' => Category::factory()->create(),
        ];
    }
}
