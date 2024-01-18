<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\ContactMessage;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
            SiteConfigSeeder::class,
        ]);

        User::factory(1)->create();

        $blogs = Blog::factory(100)->create();

        $tags = Tag::all();

        // Attach three random tags to each blog
        $blogs->each(function ($blog) use ($tags) {
            $randomTags = $tags->random(3)->pluck('id');
            $blog->tag()->attach($randomTags);
        }); 
        
        Comment::factory(200)->create();

        ContactMessage::factory(15)->create();
    }
}
