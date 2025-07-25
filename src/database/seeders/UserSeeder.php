<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'names' => 'Juan Vargas',
            'dni' => '01234567',
            'address' => 'Av. Estrella 777',
            'email' => 'admin@store.com',
            'position' => 'GERENTE',
            'password' => Hash::make('admin'),
            'role_id' => 1,
        ]);

        User::create([
            'names' => 'Hector',
            'surnames' => 'Suarez',
            'dni' => '09876543',
            'address' => 'Aija 4900',
            'email' => 'vendedor@store.com',
            'position' => 'TRABAJADOR',
            'password' => Hash::make('vendedor'),
            'role_id' => 2,
        ]);
    }
}
