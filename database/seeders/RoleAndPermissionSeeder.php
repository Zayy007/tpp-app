<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);

        $user = Role::create(['name' => 'user']);

        $dashboard = Permission::create(['name' => 'dashboard']);

        $productList = Permission::create(['name' => 'productList']);
        $productCreate = Permission::create(['name' => 'productCreate']);


        $admin->givePermissionTo([
            $dashboard,
            $productList,
            $productCreate,
        ]);

        $user->givePermissionTo([
            $dashboard,
            $productList,
        ]);

    }
}
