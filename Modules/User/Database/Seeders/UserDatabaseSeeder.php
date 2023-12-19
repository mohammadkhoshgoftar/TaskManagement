<?php

namespace Modules\User\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'first_name' => 'mohammad',
            'last_name'  => 'Khosh',
            'email' => 'mohammadkhoshgoftar5850@gmail.com',
            'password' => 12345,
        ]);
        $user  = User::query()->find(1);
        $user->assignRole('superAdmin');

    }
}
