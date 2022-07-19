<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;

class UpdateController extends \App\Http\Controllers\Controller
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        $request->session()->flash('success', 'Category have been updated');
        return redirect()->route('admin.categories.show', compact('category'));
    }
}
