<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;

class IndexController extends \App\Http\Controllers\Controller
{
    public function __invoke()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }
}
