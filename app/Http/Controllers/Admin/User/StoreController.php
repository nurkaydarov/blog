<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\StoreRequest;
use App\Jobs\StoreUserJob;
use App\Mail\User\MailPassword;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreController extends \App\Http\Controllers\Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        StoreUserJob::dispatch($data);
        session()->flash('success', 'User has been added');
        return redirect()->route('admin.users.index');
    }
}
