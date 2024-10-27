<?php

namespace App\Services\Blog;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\Category;

class BlogStoreService
{
    public function __invoke($data) 
    {
        // Add the authenticated user's ID to the data
        $data['user_id'] = auth()->id();

        // Handle file upload for 'thumbnail'
        if (isset($data['thumbnail']) && is_file($data['thumbnail'])) {
            $data['thumbnail'] = $data['thumbnail']->store('thumbnail');
        }

        // Create the blog with the relevant data
        $blog = Blog::create([
            'thumbnail'     => $data['thumbnail'],
            'category_id'   => Category::where('slug', $data['category'])->value('id'),
            'title'         => $data['title'],
            'slug'          => $data['slug'],
            'body'          => $data['body'],
            'user_id'       => $data['user_id'],
        ]);

        // Attach tags to the blog if provided
        if (isset($data['tag'])) {
            $tagIds = Tag::whereIn('slug', $data['tag'])->pluck('id')->toArray();
            $blog->tag()->attach($tagIds);
        }

        return $blog;

    }
}