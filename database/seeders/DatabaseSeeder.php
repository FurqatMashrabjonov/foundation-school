<?php

namespace Database\Seeders;

use App\Enums\ApplicationStatus;
use App\Enums\ApplicationType;
use App\Enums\CourseType;
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

        $applications = [
            [
                'name' => 'JohnDoe',
                'phone' => '998901234567',
                'status' => fake()->randomElement(ApplicationStatus::cases()),
                'course_type' => fake()->randomElement(CourseType::asArray())
            ],
            [
                'name' => 'JaneDoe',
                'phone' => '998901234568',
                'status' => fake()->randomElement(ApplicationStatus::cases()),
                'course_type' => fake()->randomElement(CourseType::asArray())
            ],
            [
                'name' => 'SamSmith',
                'phone' => '998901234569',
                'status' => fake()->randomElement(ApplicationStatus::cases()),
                'course_type' => fake()->randomElement(CourseType::asArray())
            ],
            [
                'name' => 'AliceJohnson',
                'phone' => '998901234570',
                'status' => fake()->randomElement(ApplicationStatus::cases()),
                'course_type' => fake()->randomElement(CourseType::asArray())
            ],
        ];

        foreach ($applications as $application) {
            \App\Models\Application::create([
                'name' => $application['name'],
                'phone' => $application['phone'],
                'status' => $application['status'],
                'course_type' => $application['course_type'],
            ]);
        }
    }
}
