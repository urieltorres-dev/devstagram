<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Demo User',
            'email' => 'demo@example.com',
            'username' => 'demouser',
            'imagen' => rand(1, 9) . '.jpg',
            'password' => Hash::make('123456'),
        ]);

        User::factory(10)->create();
    }
}
