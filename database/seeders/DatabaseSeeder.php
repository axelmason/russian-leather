<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Exception;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
            RolePermissionsSeeder::class,
            SettingsSeeder::class,
            CategorySeeder::class,
            ItemsSeeder::class
        ]);
    }

    public function getFixture(string $fixture_path) : array
    {
        $fixtureFile = __DIR__.'/help/'.$fixture_path;

        if (!file_exists($fixtureFile)) {
            throw new Exception('File does not exist.\nPath: '.$fixture_path);
        }

        $fixtureJson = file_get_contents($fixtureFile);
        $result = json_decode($fixtureJson, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception('Error decoding the file.');
        }

        return $result;
    }
}
