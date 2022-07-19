<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;

class EditController extends \App\Http\Controllers\Controller
{
    public function __invoke(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

}
