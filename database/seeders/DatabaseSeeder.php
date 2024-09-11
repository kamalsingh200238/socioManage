<?php

namespace Database\Seeders;

use App\Models\Society;
use App\Models\User;
use App\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::transaction(function () {
            User::factory()->role(UserRole::SOCIETY_COORDINATOR->value)->create([
                'name' => 'Society Coordinator',
                'email' => 'coordinator@example.com',
            ]);

            // Create 5 unique presidents
            $presidents = User::factory()->count(5)->role(UserRole::SOCIETY_PRESIDENT->value)->create();

            // Create 10 students
            $students = User::factory()->count(10)->role(UserRole::STUDENT->value)->create();

            // Create 50 societies and connect users
            $societies = collect();
            for ($i = 0; $i < 50; $i++) {
                // Ensure each society has a unique president
                $president = $presidents[$i] ?? null; // Cycling through the 5 unique presidents

                // Create the society with the unique president
                $society = Society::factory()->create([
                    'president_id' => $president->id ?? null,
                ]);
                $societies->push($society);

                // Assign 2 random students to each society
                $society->members()->attach($students->random(2));
            }

            // Ensure all students are part of at least one society
            $students->each(function ($student) use ($societies) {
                if ($student->societies()->count() == 0) {
                    $societies->random()->members()->attach($student);
                }
            });

            // Ensure all presidents are part of their own society
            $presidents->each(function ($president) use ($societies) {
                $society = $societies->where('president_id', $president->id)->first();
                if ($society) {
                    $society->members()->attach($president);
                }
            });
        });
    }
}
