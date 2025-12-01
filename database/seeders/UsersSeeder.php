<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usuario administrador
        $admin = User::factory()->create([
            'name'     => 'Admin User',
            'email'    => 'admin@example.com',
            'password' => bcrypt('admin12345678'),
        ]);
        $admin->assignRole('admin');

        // Usuario normal
        $normalUser = User::factory()->create([
            'name'     => 'Normal User',
            'email'    => 'user@example.com',
            'password' => bcrypt('user12345678'),
        ]);
        $normalUser->assignRole('user');
    }
}
