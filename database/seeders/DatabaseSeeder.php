<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

        $tasks = [
            ['title' => 'Task 1', 'description' => 'Description for Task 1', 'status' => 'todo', 'order_column' => 1],
            ['title' => 'Task 2', 'description' => 'Description for Task 2', 'status' => 'in_progress', 'order_column' => 2],
            ['title' => 'Task 3', 'description' => 'Description for Task 3', 'status' => 'completed', 'order_column' => 3],
            ['title' => 'Task 4', 'description' => 'Description for Task 4', 'status' => 'todo', 'order_column' => 4],
            ['title' => 'Task 5', 'description' => 'Description for Task 5', 'status' => 'in_progress', 'order_column' => 5],
            ['title' => 'Task 6', 'description' => 'Description for Task 6', 'status' => 'completed', 'order_column' => 6],
            ['title' => 'Task 7', 'description' => 'Description for Task 7', 'status' => 'todo', 'order_column' => 7],
            ['title' => 'Task 8', 'description' => 'Description for Task 8', 'status' => 'in_progress', 'order_column' => 8],
            ['title' => 'Task 9', 'description' => 'Description for Task 9', 'status' => 'completed', 'order_column' => 9],
            ['title' => 'Task 10', 'description' => 'Description for Task 10', 'status' => 'todo', 'order_column' => 10],
        ];

        foreach ($tasks as $task) {
            \App\Models\Task::create($task);
        }

    }
}
