<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Create Roles
        // Role::create(['name' => 'Admin']);
        // Role::create(['name' => 'Owner']);
        // Role::create(['name' => 'User']);
        Role::create(['name' => 'Sales']);
        Role::create(['name' => 'IT']);
        Role::create(['name' => 'Finance']);
        Role::create(['name' => 'Marcomm']);

        // Create Permissions
        Permission::create(['name' => 'view ticket']);
        Permission::create(['name' => 'create ticket']);
        Permission::create(['name' => 'update ticket']);
        Permission::create(['name' => 'delete ticket']);

        // Assign Role to User
        $user = User::find(1); // Replace 1 with the actual user ID
        $user->assignRole('IT');

        // Assign Permissions to Role
        $adminRole = Role::findByName('IT');
        $adminRole->givePermissionTo('update ticket');
    }
}
