<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Oc',
            'email' => 'oc@gmail.com',
            'password' => bcrypt('12345678'), // La contraseña cifrada
        ]);
    }
}
