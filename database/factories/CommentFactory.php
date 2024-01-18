<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $blog_count = Blog::count();

        return [
            'blog_id'  => rand(1, $blog_count),
            'name'     => $this->faker->name(),
            'email'    => $this->faker->email(),
            'body'     => $this->faker->realText(),
        ];
    }
}
