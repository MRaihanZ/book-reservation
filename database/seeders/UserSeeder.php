<?php

namespace Database\Seeders;

use App\Models\User;
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
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Librarian',
            'username' => 'librarian',
            'email' => 'librarian@mail.com',
            'password' => Hash::make('password'),
            'role' => 'librarian',
        ]);

        User::create([
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@mail.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
