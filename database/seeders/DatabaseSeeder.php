<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(3)->create();

        \App\Models\User::factory()->create([
            'first_name' => 'User',
            'last_name' => 'One',
            'email' => 'test@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone_number' => '08055429961',
            'is_admin' => 0,
            'is_active' => 0,
        ]);
        \App\Models\User::factory()->create([
            'first_name' => 'User',
            'last_name' => 'Two',
            'email' => 'test2@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone_number' => '08139453125',
            'is_admin' => 0,
            'is_active' => 1,
        ]);
        \App\Models\User::factory()->create([
            'first_name' => 'Test',
            'last_name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone_number' => '08064402809',
            'is_admin' => 1,
            'is_active' => 1,
        ]);
    }
}
