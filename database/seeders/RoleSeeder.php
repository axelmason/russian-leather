<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        echo "Creating roles...\n";

        $roles = [
            'admin' => 'Администратор',
            'guest' => 'Гость',
            'individual' => 'Физ. лицо',
            'entity' => 'Юр. лицо',
            'main_editor' => 'Главный редактор',
            'manager' => 'Менеджер',
        ];

        foreach($roles as $slug => $name) {
            Role::create(['name' => $name, 'slug' => $slug]);
            echo "Role $slug ($name) created.\n";
        }
    }
}
