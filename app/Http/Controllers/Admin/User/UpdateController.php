<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateController extends \App\Http\Controllers\Controller
{
    public function __invoke(UpdateRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::query()->update($data);
        session()->flash('success', 'User has been updated');
        return redirect()->route('admin.users.index');
    }
}
