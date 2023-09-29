<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Item;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

/**
 * PHPUnit で Feature テスト毎に実行する初期化用シーダー
 */
class FeatureTestSetUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::insert([
            'name' => 'Administrator',
            'slug' => 'administrator',
        ]);

        Permission::truncate();
        Permission::insert([
            [
                'name'        => 'All permission',
                'slug'        => '*',
                'http_method' => '',
                'http_path'   => '*',
            ],
        ]);

        Admin::truncate();
        Item::truncate();
        Brand::truncate();
        Category::truncate();
    }
}
