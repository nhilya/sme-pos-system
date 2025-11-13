<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class StaffRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function adminRoles(): array
    {
        return [
            [
                'name' => 'super_admin',
                'display_name' => 'Super Admin',
                'description' => 'Full access to all resources',
            ],
            [
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'All resources to staff and manager access, except sensitive data',
            ],
            [
                'name' => 'staff',
                'display_name' => 'Staff',
                'description' => 'Limited access to daily sales activity',
            ],
            [
                'name' => 'manager',
                'display_name' => 'Manager',
                'description' => 'Have staff access, manage staff and reports',
            ],
            [
                'name' => 'customer',
                'display_name' => 'Customer',
                'description' => 'Customer role for orders and interactions',
            ],
        ];
    }

    /**
     * Run the database seeds.
     */
    public static function runUp(): void
    {
        foreach (self::adminRoles() as $role) {
            Role::create($role);
        }
    }

    public static function runDown(): void
    {
        foreach (self::adminRoles() as $role) {
            Role::where('name', $role['name'])->delete();
        }
    }
}
