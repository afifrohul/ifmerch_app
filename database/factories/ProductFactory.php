<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => 'product.jpg',
            'name' => $this->faker->sentence(2),
            'desc' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum, amet. Adipisci facilis officiis voluptate quod odio laboriosam eaque aliquid ipsum!',
            'price' =>$this->faker->randomNumber(6, true),
            'slug' =>$this->faker->slug()
        ];
    }
}

