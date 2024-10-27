<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Blog;

class CmtController extends Controller
{   
    public function store(Blog $blog, CommentRequest $request) {
        $blog->comment()->create($request->validated());

        return redirect('/blogs/' .$blog->slug)->with('success', 'Comment added successfully!');
    }  
}
