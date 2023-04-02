<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;

class CreateController extends \App\Http\Controllers\Controller
{
    public function __invoke()
    {
        $roles = User::getRoles();
        return view('admin.users.create', compact('roles'));
    }
}
