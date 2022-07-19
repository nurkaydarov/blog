<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;

class UpdateController extends \App\Http\Controllers\Controller
{
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();

        $tag->update($data);
        $request->session()->flash('success', 'Tag has been updated');
        return redirect()->route('admin.tags.index');
    }
}
