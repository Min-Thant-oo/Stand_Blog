<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $category_count = Category::count();
        // $user_count = User::count();

        return [
            'category_id' => rand(1, $category_count),
            'user_id'     => 1,
            // 'tag_id'      => Tag::factory(),
            'title'       => $this->faker->realText(25),
            'slug'        => $this->faker->slug(),
            'body'        => $this->faker->realText(),
        ];
    }
}
