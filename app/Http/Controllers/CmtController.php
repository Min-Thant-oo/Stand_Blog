<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class CmtController extends Controller
{   
    public function commentStore(Blog $blog) {
        // dd($blog);
        request()->validate([
            'name' => 'min:1 | required',
            'email' => 'email |required',
            'body' => 'min:1 | required',
        ]);

        // comment store
        $blog->comment()->create([
            'name' => request('name'),
            'email' => request('email'),
            'body'  => request('body'),
        ]);

        return redirect('/blogs/' .$blog->slug)->with('success', 'Comment added successfully!');
    }  
}
