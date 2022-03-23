<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'logo' => $this->faker->image(null, 640, 480),
            'class_id' => $this->faker->randomNumber(5, true),
            'lesson_id' => $this->faker->randomNumber(5, true),
            'user_id' => $this->faker->randomNumber(5, true),
        ];
    }
}
