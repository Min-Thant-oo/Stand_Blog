<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Http\Requests\TagRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class TagController extends Controller
{
    public function index()
    {
        return view('admin.tag.index', [
            'tags' => Tag::withCount('blog')
                ->orderBy('id')
                ->filter(request(['search']))
                ->paginate(10)
                ->withQueryString(),
        ]);
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(TagRequest $request)
    {
        Tag::create($request->validated());
        Cache::forget('tags');
        return redirect()->route('tags.index')->with('success', 'Tag Successfully Created');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', [
            'tag' => $tag,
        ]);
    }

    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->validated());
        Cache::forget('tags');
        return redirect()->route('tags.index')->with('success', 'Tag Successfully Updated');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        Cache::forget('tags');
        return back()->with('success', 'Tag Successfully Deleted');
    }
}
