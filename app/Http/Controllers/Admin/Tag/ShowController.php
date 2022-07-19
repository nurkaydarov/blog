<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;

class ShowController extends \App\Http\Controllers\Controller
{
    public function __invoke(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }
}
