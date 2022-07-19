<?php
namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        Category::query()->firstOrCreate($data); //firstOrCreate(['title' => $data['title']])
        $request->session()->flash('success', 'Category added successful!');
        return redirect()->route('admin.categories.index');

    }

}
