<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\AdminPermission;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleAdmin;
use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // create a role.
        Role::truncate();
        Role::create([
            'name' => 'Administrator',
            'slug' => 'administrator',
        ]);

        //create a permission
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
        Admin::insert([
            [
                'id' => 1,
                'name' => '管理者A',
                'email' => 'admin@example.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'created_at' => '2022-07-01 10:00:00',
                'updated_at' => '2022-07-01 10:00:00',
            ],
        ]);

        RoleAdmin::truncate();
        RoleAdmin::insert([
            [
                'role_id' => 1,
                'user_id' => 1,
            ],
        ]);

        AdminPermission::truncate();
        AdminPermission::insert([
            [
                'user_id' => 1,
                'permission_id' => 1,
            ],
        ]);
    }
}
