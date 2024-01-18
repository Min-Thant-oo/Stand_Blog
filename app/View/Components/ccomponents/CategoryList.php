<?php

namespace App\View\Components\ccomponents;

use App\Models\Category;
use Illuminate\View\Component;

class CategoryList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ccomponents.category-list', [
            'categories' => Category::all(),
        ]);
    }
}
