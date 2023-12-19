<?php

namespace Modules\Permission\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Permission\Http\Controllers\PermissionController;
use Modules\Permission\Repository\PermissionRepository;
use Spatie\Permission\Models\Role;

class PermissionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'superAdmin',
            'guard_name' => 'api',
        ]);
        Role::create([
            'name' => 'admin',
            'guard_name' => 'api',
        ]);
        Role::create([
            'name' => 'user',
            'guard_name' => 'api',
        ]);
        $repository = new PermissionRepository();
        $seedPermission =  new PermissionController($repository);
        $seedPermission->update();
    }
}
