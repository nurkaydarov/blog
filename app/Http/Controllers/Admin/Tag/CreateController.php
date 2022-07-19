<?php

namespace App\Http\Controllers\Admin\Tag;

class CreateController extends \App\Http\Controllers\Controller
{
    public function __invoke()
    {
        return view('admin.tags.create');
    }
}
