<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;

class IndexController extends \App\Http\Controllers\Controller
{
    public function __invoke()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
}
