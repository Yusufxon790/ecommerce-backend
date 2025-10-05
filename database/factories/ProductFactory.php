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
            'category_id'=>rand(1,5),
            'name' => [
                'uz'=>$this->faker->sentence(3),
                'en'=>"Convinient armchair for your home"
            ],
            'price'=>rand(50000,10000000),
            'description'=>[
                'uz'=>$this->faker->paragraph(5),
                'en'=>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt ea dolore vero quaerat amet officiis, provident, eos, eius odit unde sapiente iste. Temporibus mollitia error ad, esse doloribus natus recusandae!"
            ]
        ];
    }
}
