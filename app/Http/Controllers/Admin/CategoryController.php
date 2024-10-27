<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::withCount('blog')
                            ->orderBy('id')
                            ->filter(request(['search']))
                            ->paginate(10)
                            ->withQueryString(),
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
        Cache::forget('categories');
        return redirect()->route('categories.index')->with('success', 'Category Successfully Created');
    }

    public function edit(Category $category) {
        return view('admin.category.edit', [
            'category'  => $category,
        ]);
    }
    
    public function update(Category $category, CategoryRequest $request)
    {
        $category->update($request->validated());
        Cache::forget('categories');
        return redirect()->route('categories.index')->with('success', 'Category Updated Successfully');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        Cache::forget('categories');
        return back()->with('success', 'Category Successfully deleted');
    }
}
