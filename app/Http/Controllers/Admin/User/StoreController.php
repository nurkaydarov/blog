<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreController extends \App\Http\Controllers\Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        //dd($data);
        User::query()->firstOrCreate(['email' => $data['email']], $data);
        session()->flash('success', 'User has been added');
        return redirect()->route('admin.users.index');
    }
}
