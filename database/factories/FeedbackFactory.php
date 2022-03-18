<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'img' => 'testi.jpg',
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(), 
            'desc' => $this->faker->paragraph(5),
        ];
    }
}
