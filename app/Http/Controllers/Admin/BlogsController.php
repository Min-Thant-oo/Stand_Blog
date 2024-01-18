<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function home()
    {
        return view('admin.home.home', [
            'blog' => Blog::latest()->get(),
            'comment' => Comment::latest()->get(),
            'category' => Category::latest()->get(),
            'tag' => Tag::latest()->get(),
        ]);
    }

    public function blogs()
    {
        return view('admin.blog.blog', [
            'blogs' => Blog::orderBy('id')
                ->filter(request(['search', 'category', 'tag']))
                ->paginate(10)
                ->withQueryString(),

            'category' => Category::all(),
            'tag'      => Tag::all(),
        ]);
    }

    public function blogCreate()
    {
        return view('admin.blog.blog-createform', [
            'category' => Category::orderby('id')->get(),
            'tag'      => Tag::all(),
        ]);
    }

    public function blogStore() {
        $formData = request()->validate([
            'thumbnail' => 'required | image | mimes:jpeg,png,jpg,gif,svg | max:2048',
            'category' => 'required | exists:categories,slug',
            'tag' => 'required | array | max:3 ',
            'tag.*' => 'required | exists:tags,slug',
            'title' => 'required',
            'slug'  => 'required | unique:blogs,slug',
            'body'  => 'required',
        ]);

        $formData['user_id'] = auth()->id();
        $formData['thumbnail'] = request()->file('thumbnail')->store('thumbnail');


        $blog = Blog::create([
            'thumbnail' => $formData['thumbnail'],
            'category_id' => Category::where('slug', $formData['category'])->value('id'),
            'title' => $formData['title'],
            'slug' => $formData['slug'],
            'body' => $formData['body'],
            'user_id' => $formData['user_id'],
        ]);

        // Attach tags to the blog
        if (isset($formData['tag'])) {
            $tagIds = Tag::whereIn('slug', $formData['tag'])->pluck('id')->toArray();
            $blog->tag()->attach($tagIds);
        }

        // session()->flash('success', 'Blog Created Successfully');

        return Redirect('/admin/blogs')->with('success', 'Blog Created Successfully');
    }


    public function blogEdit(Blog $blog)
    {
        return view('admin.blog.blog-editform', [
            'blog' => $blog,
            'category' => Category::orderby('id')->get(),
            'tag'      => Tag::all(),
        ]);
    }

    public function blogUpdate(Blog $blog) {
        $formData = request()->validate([
            // 'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|exists:categories,slug',
            'tag' => 'required|array|max:3',
            'tag.*' => 'required|exists:tags,slug',
            'title' => 'required',
            'slug' => 'required|unique:blogs,slug,' . $blog->id, // Exclude current blog from unique check
            'body' => 'required',
        ]);

        $formData['user_id'] = auth()->id();
        $formData['thumbnail'] = request()->file('thumbnail') ? request()->file('thumbnail')->store('thumbnail') : $blog->thumbnail;


        // Retain old thumbnail if not provided in the request
        // if (!request()->hasFile('thumbnail')) {
        //     $formData['thumbnail'] = $blog->thumbnail;
        // } else {
        //     $formData['thumbnail'] = request()->file('thumbnail')->store('thumbnail');
        // }

        // Update the blog data
        $blog->update([
            'category_id' => Category::where('slug', $formData['category'])->value('id'),
            'title' => $formData['title'],
            'slug' => $formData['slug'],
            'body' => $formData['body'],
            'user_id' => $formData['user_id'],
            'thumbnail' => $formData['thumbnail'], // Update or retain thumbnail
        ]);

        // Sync tags for the blog
        if (isset($formData['tag'])) {
            $tagIds = Tag::whereIn('slug', $formData['tag'])->pluck('id')->toArray();
            $blog->tag()->sync($tagIds); // Use sync to update tags
        } else {
            $blog->tag()->detach(); // Remove all tags if none provided
        }

        return redirect('/admin/blogs')->with('success', 'Blog Successfully Updated');
    }



    public function blogDestroy(Blog $blog)
    {
        $blog->delete();
        return back()->with('success', 'Blog Successfully Deleted');
    }

    public function comments()
    {
        return view('admin.comment.comment', [
            'blogs' => Blog::all(),

            'comments' => Comment::orderBy('id')
                ->filter(request(['search', 'title']))
                ->paginate(20)
                ->withQueryString(),
        ]);
    }
}
