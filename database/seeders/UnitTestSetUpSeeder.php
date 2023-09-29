<?php

use App\Models\AdminPermission;
use App\Models\AdminRole;
use App\Models\AdminRoleUser;
use App\Models\AdminUser;
use App\Models\AdminUserPermission;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\ItemDetail;
use App\Models\ItemImage;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\UserDetail;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * PHPUnit で Unit テスト時に必要に応じて実行する初期化用シーダー
 */
class UnitTestSetUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ja_JP'); // prefectureが日本にしか存在しないため
        $dateNow = Carbon::now();

        AdminRole::truncate();
        AdminRole::insert([
            'name' => 'Administrator',
            'slug' => 'administrator',
        ]);

        AdminPermission::truncate();
        AdminPermission::insert([
            [
                'name'        => 'All permission',
                'slug'        => '*',
                'http_method' => '',
                'http_path'   => '*',
            ],
        ]);

        AdminUser::truncate();
        AdminUser::insert([
            [
                'name' => 'adminuser',
                'username' => 'adminuser',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            ],
        ]);

        AdminRoleUser::truncate();
        AdminRoleUser::insert([
            [
                'role_id' => 1,
                'user_id' => 1,
            ],
        ]);

        AdminUserPermission::truncate();
        AdminUserPermission::insert([
            [
                'user_id' => 1,
                'permission_id' => 1,
            ],
        ]);

        // truncateを実行しようとすると外部キー制約が入るので一旦ここではチェックを外す
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Brand::truncate();
        Brand::insert([
            [
                'name' => 'Brand',
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
        ]);

        Category::truncate();
        Category::insert([
            [
                'name' => 'category1',
                'parent_category_id' => 0,
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'name' => 'category2',
                'parent_category_id' => 1,
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
            [
                'name' => 'category3',
                'parent_category_id' => 2,
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
        ]);

        User::truncate();
        User::insert([
            [
                'name' => 'username',
                'email' => 'example@example.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
        ]);

        UserDetail::truncate();
        UserDetail::insert([
            [
                'nickname' => 'nickname',
                'birthday' => Carbon::today()->subYear(20),
                'gender' => $faker->randomElement(collect(array_keys(UserDetail::GENDER_MAP))),
                'phone' => $faker->unique()->phoneNumber,
                'postal_code' => $faker->postcode,
                'address' => $faker->prefecture . $faker->city . $faker->streetAddress,
                'user_id' => 1,
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
        ]);

        Item::truncate();
        Item::insert([
            [
                'name' => $faker->unique()->word,
                'short_description' => $faker->unique()->realText(50), // 50文字の文章
                'price' => $faker->randomNumber(2) * 10, // 2桁の数字をランダムに作成し100倍する
                'discount_percent' => $faker->randomNumber(1) * 10,
                'stock' => $faker->randomNumber(3),
                'brand_id' => 1,
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
        ]);

        ItemDetail::truncate();
        ItemDetail::insert([
            [
                'full_description' => $faker->unique()->realText(150), // 150文字の文章
                'length' => $faker->randomFloat(null, 10, 200),
                'width' => $faker->randomFloat(null, 10, 200),
                'height' => $faker->randomFloat(null, 10, 200),
                'weight' => $faker->randomFloat(null, 10, 200),
                'item_id' => 1,
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
        ]);

        Image::truncate();
        Image::insert([
            [
                'path' => "image/item-1.jpg",
                'main_flg' => 1,
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
        ]);

        ItemImage::truncate();
        ItemImage::insert([
            [
                'item_id' => 1,
                'image_id' => 1,
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
        ]);

        ItemCategory::truncate();
        ItemCategory::insert([
            [
                'item_id' => 1,
                'category_id' => 3,
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
        ]);

        Order::truncate();
        Order::insert([
            [
                'order_date' => Carbon::today(),
                'status' => $faker->randomElement([
                    Order::ORDERED,
                    Order::PAYMENT_INFO_CONFIRMED,
                    Order::READY_TO_SHIP
                ]),
                'user_id' => 1,
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
        ]);

        OrderItem::truncate();
        OrderItem::insert([
            [
                'quantity' => $faker->randomNumber(2),
                'item_id' => 1,
                'order_id' => 1,
                'created_at' => $dateNow,
                'updated_at' => $dateNow,
            ],
        ]);

        // truncate実行するために外したチェックを元に戻す
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
