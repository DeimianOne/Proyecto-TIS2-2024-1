<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Test',
            'last_name' => 'apellido1',
            'email' => 'test@test.cl',
            'password' => Hash::make('123'),
        ])->assignRole('Administrador');

        User::create([
            'name' => 'User',
            'last_name' => 'apellido1',
            'email' => 'user@user.cl',
            'password' => Hash::make('user'),
        ])->assignRole('Cliente');

    }
}
