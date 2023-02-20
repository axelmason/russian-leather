<?php

namespace App\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('permission', function ($permission) {
            if (!auth()->check()) {
                return false;
            }

            $permissions_list = explode(',', $permission);

            $role_permissions = Arr::pluck(auth()->user()->role->permissions, 'slug');

            $found = false;
            foreach ($permissions_list as $get) {
                if (in_array($get, $role_permissions)) {
                    $found = true;
                    break 1;
                }
            }

            return $found;
        });
    }
}
