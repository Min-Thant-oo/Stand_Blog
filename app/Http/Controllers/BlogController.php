<?php

namespace App\Http\Controllers;

use App\Jobs\ContactMessage as JobsContactMessage;
use App\Mail\ContactMessageMail;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\ContactMessage;
use App\Models\SiteConfig;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{

    public function index() {
        return view('components.blogs.index', [
            'blogs' => Blog::latest()
                            ->filter(request(['search', 'category', 'tag', 'username']))
                            ->paginate(4)
                            ->withQueryString(),

            'randomBlogs' => Blog::inRandomOrder()->take(5)->get(),
            'categories'  => Category::all(),
            'tags'        => Tag::all(),
            'siteconfig' => SiteConfig::first(),

        ]);
    }

    public function about() {
        return view('components.blogs.about', [
            'siteconfig' => SiteConfig::first(),
        ]);
    }

    public function contact() {
        return view('components.blogs.contact', [
            'siteconfig' => SiteConfig::first(),
        ]);
    }

    public function contactStore() {
        $formData = request()->validate([
            'name' => 'required',
            'email' => 'required | email',
            'subject' => 'required | min:2',
            'message' => 'required | min:10',
        ]);

        $contactMessage = ContactMessage::create($formData);

        // $adminEmail = SiteConfig::first()->email;

        // Mail::to($adminEmail)->queue(new ContactMessageMail($contactMessage)); 

        JobsContactMessage::dispatch($contactMessage);

        return back()->with('success', 'Message sent. We will get in touch with you shortly.');
    }



    
    public function show(Blog $blog) {
        return view('components.blogs.show', [
            'blog'=>$blog,
            'mostRead_blogs' => Blog::inRandomOrder()->take(3)->get(),
            'siteconfig' => SiteConfig::first(),
            'categories'  => Category::all(),
            'tags'        => Tag::all(),
        ]);
    }


    public function category(Category $category) {
        return view('components.blogs.index', [
            'blogs' => $category->blog,
            'randomBlogs' => Blog::inRandomOrder()->take(5)->get(),
        ]);
    }

    public function tag(Tag $tag) {
        return view('components.blogs.index', [
            'blogs' => $tag->blog,
            'randomBlogs' => Blog::inRandomOrder()->take(5)->get(),
        ]);
    }

}
