<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'source' => 'MY',
            'channel_name' => $this->faker->word(),
            'channel_img' => 'img',
            'name' => $this->faker->word(),
            'create_date' => now(),
        ];
    }
}
