<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;

class EditController extends \App\Http\Controllers\Controller
{
    public function __invoke(User $user)
    {
        $roles = User::getRoles();
        return view('admin.users.edit', compact('user', 'roles'));
    }
}
