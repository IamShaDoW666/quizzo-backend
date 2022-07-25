<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $sentence = $this->faker->sentence();
        return [
            'text' => substr($sentence, 0, strlen($sentence) - 2) . '?',
            'correct' => $this->faker->numberBetween(1,5),
            'score' => $this->faker->numberBetween(0, 5) * 10,
            'quiz_id' => $this->faker->numberBetween(1,10)
        ];
    }
}
