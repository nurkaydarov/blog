<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;

class ShowController extends \App\Http\Controllers\Controller
{
    public function __invoke(User $user)
    {
        return view('admin.users.show', compact('user'));
    }
}
