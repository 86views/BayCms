<?php

namespace Database\Factories;

// use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'user_id' => 11,
            'category_id' => 11,
            'photo_id' => 16,
            'title' => $this->faker->title(),
            'body' => $this->faker->text(),
           
        ];
    }
}
