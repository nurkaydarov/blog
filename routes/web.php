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
        Route::get('/', IndexController::class);
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function(){
        Route::get('/', IndexController::class)->name('admin.categories.index');
        Route::get('/create', \App\Http\Controllers\Admin\Category\CreateController::class)->name('admin.categories.create');
    });
});


Auth::routes();

