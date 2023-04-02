<?php

namespace App\Http\Controllers\Main;

class IndexController extends \App\Http\Controllers\Controller
{
    public function __invoke()
    {
        return redirect()->route('post.index');
    }
}
