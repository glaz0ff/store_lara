<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StoreBuyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $createdAt = $this->faker->dateTimeBetween('-3 months', '-2 months');
        return [
            'user_id' => rand(1, 2),
            'product_id'=>rand(1, 100),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
