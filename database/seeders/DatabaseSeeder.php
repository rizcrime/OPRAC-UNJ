<?php

namespace Database\Seeders;

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
        $this->call([
            LessonSeeder::class,
            RoleSeeder::class
        ]);
        // User::factory(10)->create();
        // Classroom::factory(3)->create();
        // Lesson::factory(3)->create();
        // Role::factory(3)->create();
        // Subject::factory(3)->create();
    }
}
