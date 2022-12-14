<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Task;
use App\Models\TaskCategory;
use App\Models\TaskStatus;
use Database\Factories\TaskCategoryFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory()->create([
            'first_name' => 'User',
            'last_name' => 'One',
            'email' => 'test@example.com',
            'password' => Hash::make('p@55sw0rd1'),
            'phone_number' => '08055429961',
            'is_admin' => 0,
            'is_active' => 0,
        ]);
        \App\Models\User::factory()->create([
            'first_name' => 'User',
            'last_name' => 'Two',
            'email' => 'test2@example.com',
            'password' => Hash::make('p@55sw0rd2'),
            'phone_number' => '08139453125',
            'is_admin' => 0,
            'is_active' => 1,
        ]);
        \App\Models\User::factory()->create([
            'first_name' => 'Test',
            'last_name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('p@55sw0rd0'),
            'phone_number' => '08064402809',
            'is_admin' => 1,
            'is_active' => 1,
        ]);

        \App\Models\TaskCategory::factory()->create([
            'title' => 'Planning'
        ]);
        \App\Models\TaskCategory::factory()->create([
            'title' => 'Design'
        ]);
        \App\Models\TaskCategory::factory()->create([
            'title' => 'Development'
        ]);
        \App\Models\TaskCategory::factory()->create([
            'title' => 'Implementation'
        ]);
        \App\Models\TaskCategory::factory()->create([
            'title' => 'Deployment'
        ]);
        \App\Models\TaskStatus::factory()->create([
            'name' => 'Pending'
        ]);
        \App\Models\TaskStatus::factory()->create([
            'name' => 'Done'
        ]);
        \App\Models\TaskStatus::factory()->create([
            'name' => 'Overdue'
        ]);
        

        
        // Task::factory()->count(12)->create();
    }
}
