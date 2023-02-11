<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        echo "Attaching permissions to roles...\n\n";

        $roles = [
            Role::ADMIN => Permission::PERMISSIONS,
            Role::GUEST => [
                Permission::GET_RELATED, Permission::GET_INFO, Permission::REVIEWS
            ],
            Role::INDIVIDUAL => [
                Permission::GET_RELATED, Permission::GET_INFO, Permission::PERSONAL_WORK, Permission::REVIEWS
            ],
            Role::ENTITY => [
                Permission::GET_RELATED, Permission::GET_INFO, Permission::FORM_CONTRACT, Permission::PERSONAL_WORK, Permission::REVIEWS
            ],
            Role::MANAGER => [
                Permission::ORDER_MANAGEMENT, Permission::GET_RELATED, Permission::GET_INFO, Permission::FORM_CONTRACT, Permission::PERSONAL_WORK, Permission::REVIEWS
            ]
        ];

        foreach ($roles as $role => $permissions) {
            echo "Attaching permissions to role $role...\n";
            $this->attachPermissions($role, $permissions);
            echo "Permissions ".implode(", ", $permissions)." attached to the $role role\n\n";
        }
    }

    public function attachPermissions($slug, $permissions)
    {
        $role = Role::where('slug', $slug)->first();

        foreach ($permissions as $permission) {
            $permissionId = Permission::where('name', $permission)->first();
            $role->permissions()->attach($permissionId);
        }
    }
}
