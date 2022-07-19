<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;

class DestroyController extends \App\Http\Controllers\Controller
{
    public function __invoke(Category $category)
    {
        $category->delete();
        session()->flash('success', 'Category has been deleted');
        return redirect()->route('admin.categories.index');
    }
}
