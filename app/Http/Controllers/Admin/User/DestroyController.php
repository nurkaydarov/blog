<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;

class DestroyController extends \App\Http\Controllers\Controller
{
    public function __invoke(User $user)
    {
        $user->delete();
        session()->flash('success', 'User has been deleted');
        return redirect()->route('admin.users.index');
    }
}
