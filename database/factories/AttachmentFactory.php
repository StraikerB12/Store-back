<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

class AttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = ['video', 'text', 'link', 'doc'];

        return [
            'type' => $types[array_rand($types)],
            'data' => '{"test":"test"}',
        ];
    }
}
