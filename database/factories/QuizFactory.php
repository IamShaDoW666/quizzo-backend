<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'desc' => $this->faker->paragraph(),
            'answers' => $this->faker->numberBetween(0,500),
            'active' => $this->faker->boolean(),
            'user_id' => $this->faker->numberBetween(1,3)
        ];
    }
}
