<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home.index', [
            'blogs'          => Blog::with('category')->latest()->take(5)->get(),
            'comments'       => Comment::with('blog')->latest()->take(5)->get(),
            'blogCount'      => Blog::count(),
            'tagCount'       => Tag::count(),
            'categoryCount'  => Category::count(),
            'commentCount'   => Comment::count(),
        ]);
    }
}
