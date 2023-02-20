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
            'full_access' => 'Полный доступ',
            'get_related' => 'Получение рекомендаций',
            'get_info' => 'Получение общей информации',
            'reviews' => 'Отзывы',
            'personal_work' => 'Работа с личным кабинетом',
            'form_contract' => 'Формирование типового договора и счета на оплату подтвержденного заказа',
            'edit_content' => 'Полный доступ к редактированию контента на сайте',
            'order_management' => 'Обработка заказов'
        ];

        foreach($permissions as $slug => $name) {
            Permission::create(['name' => $name, 'slug' => $slug]);
            echo "Permission $slug ($name) created.\n";
        }
    }
}
