<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $guest = User::create([
            'name' => "Guest",
            'email' => "guest@gmail.com",
            'password' => Hash::make('password'),
        ]);

        $admin->assignRole('admin');
        $guest->assignRole('user');
    }
}
