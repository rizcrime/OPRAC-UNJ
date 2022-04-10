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
            'classname' => $this->faker->words(3, true),
            'lesson' => $this->faker->randomNumber(5, true),
            'members' => $this->faker->words(3, true),
            'link_g_meet' => $this->faker->url(),
        ];
    }
}
