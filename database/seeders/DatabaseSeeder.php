<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Task;
use App\Models\TaskStatus;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        TaskStatus::create(['name' => 'В работе',]);
        TaskStatus::create(['name' => 'В обработке',]);
        TaskStatus::create(['name' => 'Закрыто',]);
        TaskStatus::create(['name' => 'Отменено',]);
        Task::create([
            'name' => 'Test 1',
            'description' => 'Description 1',
            'task_status_id' => 1,
        ]);
        Task::create([
            'name' => 'Test 2',
            'description' => 'Description 2',
            'task_status_id' => 2,
        ]);
        Task::create([
            'name' => 'Test 3',
            'description' => 'Description 3',
            'task_status_id' => 3,
        ]);
        Task::create([
            'name' => 'Test 4',
            'description' => 'Description 4',
            'task_status_id' => 4,
        ]);
    }


}
