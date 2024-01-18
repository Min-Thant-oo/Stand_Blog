<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function tags()
    {
        return view('admin.tag.tag', [
            'tags' => Tag::orderBy('id')
                ->filter(request(['search']))
                ->paginate(10)
                ->withQueryString(),
        ]);
    }

    public function tagCreate()
    {
        return view('admin.tag.tag-createform');
    }

    public function tagStore()
    {
        $formData = request()->validate([
            'name' => 'required | unique:tags,name',
            'slug' => 'required | unique:tags,slug'
        ]);

        Tag::create($formData);

        return redirect('/admin/tags')->with('success', 'Tag Successfully Created');
    }

    public function tagEdit(Tag $tag)
    {
        return view('admin.tag.tag-editform', [
            'tag' => $tag,
        ]);
    }

    public function tagUpdate(Tag $tag)
    {
        $formData = request()->validate([
            'name' => 'required | unique:tags,name,' . $tag->id,
            'slug' => 'required | unique:tags,slug,' . $tag->id,
        ]);

        $tag->update($formData);
        return redirect('/admin/tags')->with('success', 'Tag Successfully Updated');
    }

    public function tagDestroy(Tag $tag)
    {
        $tag->delete();
        return back()->with('success', 'Tag Successfully Deleted');
    }
}
