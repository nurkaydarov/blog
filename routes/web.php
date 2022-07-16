<?php



use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Blog'], function(){
   Route::get('/', \App\Http\Controllers\Blog\IndexController::class);
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){
    Route::group(['namespace' => 'Blog'], function(){
        Route::get('/', IndexController::class)->name('admin.home');
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function(){
        Route::get('/', IndexController::class)->name('admin.categories.index');
        Route::get('/create', \App\Http\Controllers\Admin\Category\CreateController::class)->name('admin.categories.create');
        Route::post('/', \App\Http\Controllers\Admin\Category\StoreController::class)->name('admin.categories.store');
        Route::get('/{category}', \App\Http\Controllers\Admin\Category\ShowController::class)->name('admin.categories.show');
        Route::get('/{category}/edit', \App\Http\Controllers\Admin\Category\EditController::class)->name('admin.categories.edit');
        Route::patch('/{category}', \App\Http\Controllers\Admin\Category\UpdateController::class)->name('admin.categories.update');
    });
});


Auth::routes();

