<?php

namespace Database\Seeders;

use App\Models\Role;
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
        echo "Creating roles...\n";

        $roles = [
            'admin' => 'Администратор',
            'guest' => 'Гость',
            'individual' => 'Физ. лицо',
            'entity' => 'Юр. лицо',
            'main_editor' => 'гланый редактор',
            'manager' => 'Менеджер',
        ];

        foreach($roles as $slug => $name) {
            Role::create(['name' => $name, 'slug' => $slug]);
            echo "Role ".$role." created.\n";
        }
    }
}
