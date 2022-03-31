<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Classroom;
use App\Models\Lesson;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();
        Classroom::factory(3)->create();
        Lesson::factory(3)->create();
        Role::factory(3)->create();
    }
}
