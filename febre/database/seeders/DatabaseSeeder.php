<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::create([
            'name' => 'Febre',
            'email' => 'febre@gmail.com',
            'password' => Hash::make('123456789'), // Cambia 'password' por la contraseña deseada
            'usertype' => 'admin', // Asignar el tipo de usuario como 'admin'
            'email_verified_at' => now(),
        ]);
        User::create([
            'name' => 'Anthony',
            'email' => 'anto@gmail.com',
            'password' => Hash::make('123456789'), // Cambia 'password' por la contraseña deseada
            'usertype' => 'admin', // Asignar el tipo de usuario como 'admin'
            'email_verified_at' => now(),]);
    }
}