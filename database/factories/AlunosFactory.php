<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AlunosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'email' => $this->faker->email(),
            'data_nascimento' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'curso_id' => $this->faker->numberBetween($min = 1, $max = 45)
        ];
    }
}
