<?php

namespace App\Http\Controllers\admin;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Category;
use App\Http\Requests\BlogRequest;
use App\Http\Controllers\Controller;
use App\Services\Blog\BlogStoreService;
use App\Services\Blog\BlogUpdateService;

class BlogsController extends Controller
{
    public function index()
    {
        return view('admin.blog.index', [
            'blogs' => Blog::with('category')
                ->withCount('tag', 'comment')
                ->orderBy('id')
                ->filter(request(['search', 'category', 'tag']))
                // ->get(),
                ->paginate(10)
                ->withQueryString(),

            'categories' => Category::all(),
            'tags'      => Tag::all(),
        ]);
    }

    public function create()
    {
        return view('admin.blog.create', [
            'categories' => Category::latest()->get(),
            'tags'      => Tag::latest()->get(),
        ]);
    }

    public function store(BlogRequest $request, BlogStoreService $blogStoreService) 
    {
        $blogStoreService($request->validated());
        return redirect()->route('blogs.index')->with('success', 'Blog Created Successfully');
    }


    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', [
            'blog'          => $blog,
            'categories'    => Category::latest()->get(),
            'tags'          => Tag::latest()->get(),
        ]);
    }

    public function update(Blog $blog, BlogRequest $request, BlogUpdateService $blogUpdateService) 
    {
        $blogUpdateService($blog, $request->validated());
        return redirect()->route('blogs.index')->with('success', 'Blog Successfully Updated');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back()->with('success', 'Blog Successfully Deleted');
    }

    // public function comments()
    // {
    //     return view('admin.comment.index', [
    //         'blogs' => Blog::all(),

    //         'comments' => Comment::orderBy('id')
    //             ->filter(request(['search', 'title']))
    //             ->paginate(20)
    //             ->withQueryString(),
    //     ]);
    // }
}
