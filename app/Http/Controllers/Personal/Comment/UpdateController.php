<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Comment $comment)
    {
        $data = $request->validated();

        try {

            $comment->update($data);

        } catch (\Exception $e) {
             dd($e->getMessage());
        }
        DB::enableQueryLog();
        session()->flash('success', 'Comment has been updated');
        return redirect()->route('personal.comments.index');
    }
}
