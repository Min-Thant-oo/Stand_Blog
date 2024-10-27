<?php

namespace App\Services\Blog;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;

class BlogUpdateService
{
    public function __invoke(Blog $blog, array $formData)
    {
        $formData['user_id'] = auth()->id();
        $formData['thumbnail'] = request()->file('thumbnail') 
            ? request()->file('thumbnail')->store('thumbnail') 
            : $blog->thumbnail;

        // Update the blog
        $blog->update([
            'category_id' => Category::where('slug', $formData['category'])->value('id'),
            'title' => $formData['title'],
            'slug' => $formData['slug'],
            'body' => $formData['body'],
            'user_id' => $formData['user_id'],
            'thumbnail' => $formData['thumbnail'],
        ]);

        // Sync tags for the blog
        if (isset($formData['tag'])) {
            $tagIds = Tag::whereIn('slug', $formData['tag'])->pluck('id')->toArray();
            $blog->tag()->sync($tagIds);
        } else {
            $blog->tag()->detach();
        }
    }
}
