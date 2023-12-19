<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Permission\Database\Seeders\PermissionDatabaseSeeder;
use Modules\User\Database\Seeders\UserDatabaseSeeder;

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
           PermissionDatabaseSeeder::class,
           UserDatabaseSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
