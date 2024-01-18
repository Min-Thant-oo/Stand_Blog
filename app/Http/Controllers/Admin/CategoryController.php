<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories()
    {
        return view('admin.category.category', [
            'categories' => Category::orderBy('id')
                ->filter(request(['search']))
                ->paginate(10)
                ->withQueryString(),
        ]);
    }

    public function categoryCreate()
    {
        return view('admin.category.category-createform');
    }

    public function categoryStore()
    {
        $formData = request()->validate([
            'name' => 'required | unique:categories,name',
            'slug' => 'required | unique:categories,slug'
        ]);
        Category::create($formData);
        return redirect('/admin/categories')->with('success', 'Category Successfully Created');
    }
    

    public function categoryUpdate(Category $category)
    {
        $formData = request()->validate([
            'name' => 'required | unique:categories,name,' . $category->id,
            'slug' => 'required | unique:categories,slug,' . $category->id,
        ]);
        $category->update($formData);
        return redirect('/admin/categories')->with('success', 'Category Updated Successfully');
    }

    public function categoryDestroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Category Successfully deleted');
    }
}
