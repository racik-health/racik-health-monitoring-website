<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // declare permissions
        $permissions = [
            // permissions for admin
            'manage patients',
            'manage herbal medicines',
            'monitor dispenser',
            'view consumption report',

            // permissions for patient (user)
            'input symptoms',
            'control dispenser',
            'view recommendation',
            'view consumption history',
        ];

        // create permissions
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // create roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'patient']);

        // add permissions to roles
        $adminRole->syncPermissions($permissions);
        $userRole->syncPermissions([
            'input symptoms',
            'control dispenser',
            'view recommendation',
            'view consumption history',
        ]);

        // create super admin and assign role
        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@racik.my.id',
            'password' => Hash::make(env('ADMIN_PASSWORD', 'password')),
            'phone_number' => '+6281282159360',
            'gender' => 'male',
        ]);

        $admin->assignRole($adminRole);
    }
}
