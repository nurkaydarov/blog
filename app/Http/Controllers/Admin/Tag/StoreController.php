<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Models\Tag;

class StoreController extends \App\Http\Controllers\Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Tag::query()->firstOrCreate($data);
        $request->session()->flash('success', 'Tag has been added');
        return redirect()->route('admin.tags.index');
    }
}
