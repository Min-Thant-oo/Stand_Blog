<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\Category;
use App\Models\SiteConfig;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\ContactMessageRequest;
use App\Jobs\ContactMessage as JobsContactMessage;

class BlogController extends Controller
{
    public function index() {
        return view('components.blogs.index', [
            'blogs' => Blog::with('user', 'category', 'tag')
                            ->withCount('comment')
                            ->latest()
                            ->filter(request(['search', 'category', 'tag', 'username']))
                            ->paginate(4)
                            ->withQueryString(),

            'randomBlogs' => Blog::with('category')
                                ->withCount('comment')
                                ->inRandomOrder()
                                ->take(5)
                                ->get(),
                                
            'categories' => Cache::remember('categories', 60, function () {
                return Category::all();
            }),

            'tags' => Cache::remember('tags', 60, function () {
                return Tag::all();
            }),

            'siteconfig' => Cache::remember('site_config', 60, function () {
                return SiteConfig::first();
            }),


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

    public function contactStore(ContactMessageRequest $request) {
        $contactMessage = ContactMessage::create($request->validated());

        JobsContactMessage::dispatch($contactMessage);

        return back()->with('success', 'Message received. We will get in touch with you shortly.');
    }
    
    public function show(Blog $blog) {
        return view('components.blogs.show', [
            'blog'              => $blog,
            'mostRead_blogs'    => Blog::inRandomOrder()->take(3)->get(),
            'siteconfig'        => SiteConfig::first(),
            'categories'        => Category::all(),
            'tags'              => Tag::all(),
        ]);
    }

}
