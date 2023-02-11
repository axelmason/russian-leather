<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        echo "Creating permissions...\n";

        $permissions = [
            'full_access',
            'get_related',
            'get_info',
            'reviews',
            'personal_work',
            'form_contract',
            'edit_content',
            'order_management'
        ];

        foreach($permissions as $p) {
            Permission::create(['name' => $p]);
            echo "Permission $p created.\n";
        }
    }
}
