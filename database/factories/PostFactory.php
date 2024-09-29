<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //Llenamos con datos ficticios la tabla de Post
            'titulo' => $this->faker->sentence(5),
            'descripcion' => $this->faker->sentence(26),
            'imagen' =>  rand(1, 9) . '.jpg',
        ];
    }
}
