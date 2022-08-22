<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StoreProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(rand(3, 8));
        $txt = $this->faker->realText(rand(1000, 4000));
        $createdAt = $this->faker->dateTimeBetween('-3 months', '-2 months');
        return [
            'category_id' => rand(1,11),
            'seller_id' => (rand(1,5) == 5) ? 1 : 2,
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $txt,
            'price' => rand(100,1000),

            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
