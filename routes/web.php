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
   Route::get('/', \App\Http\Controllers\Blog\IndexController::class)->name('home');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin' , 'middleware' => ['auth','admin']], function(){
    Route::group(['namespace' => 'Blog'], function(){
        Route::get('/', IndexController::class)->name('admin.home');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function(){
        Route::get('/', \App\Http\Controllers\Admin\Post\IndexController::class)->name('admin.posts.index');
        Route::get('/create', \App\Http\Controllers\Admin\Post\CreateController::class)->name('admin.posts.create');
        Route::post('/', \App\Http\Controllers\Admin\Post\StoreController::class)->name('admin.posts.store');
        Route::get('/{post}', \App\Http\Controllers\Admin\Post\ShowController::class)->name('admin.posts.show');
        Route::get('/{post}/edit', \App\Http\Controllers\Admin\Post\EditController::class)->name('admin.posts.edit');
        Route::patch('/{post}', \App\Http\Controllers\Admin\Post\UpdateController::class)->name('admin.posts.update');
        Route::delete('/{post}', \App\Http\Controllers\Admin\Post\DestroyController::class)->name('admin.posts.delete');
    });


    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function(){
        Route::get('/', IndexController::class)->name('admin.categories.index');
        Route::get('/create', \App\Http\Controllers\Admin\Category\CreateController::class)->name('admin.categories.create');
        Route::post('/', \App\Http\Controllers\Admin\Category\StoreController::class)->name('admin.categories.store');
        Route::get('/{category}', \App\Http\Controllers\Admin\Category\ShowController::class)->name('admin.categories.show');
        Route::get('/{category}/edit', \App\Http\Controllers\Admin\Category\EditController::class)->name('admin.categories.edit');
        Route::patch('/{category}', \App\Http\Controllers\Admin\Category\UpdateController::class)->name('admin.categories.update');
        Route::delete('/{category}', \App\Http\Controllers\Admin\Category\DestroyController::class)->name('admin.categories.delete');
    });
    Route::group(['namespace' => 'Tag', 'prefix' =>'tags'], function(){
       Route::get('/', \App\Http\Controllers\Admin\Tag\IndexController::class)->name('admin.tags.index');
       Route::get('/create', \App\Http\Controllers\Admin\Tag\CreateController::class)->name('admin.tags.create');
       Route::post('/', \App\Http\Controllers\Admin\Tag\StoreController::class)->name('admin.tags.store');
       Route::get('/{tag}', \App\Http\Controllers\Admin\Tag\ShowController::class)->name('admin.tags.show');
       Route::get('/{tag}/edit', \App\Http\Controllers\Admin\Tag\EditController::class)->name('admin.tags.edit');
       Route::patch('/{tag}',\App\Http\Controllers\Admin\Tag\UpdateController::class)->name('admin.tags.update');
       Route::delete('/{tag}',\App\Http\Controllers\Admin\Tag\DestroyController::class)->name('admin.tags.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function(){
       Route::get('/', \App\Http\Controllers\Admin\User\IndexController::class)->name('admin.users.index');
       Route::get('/create', \App\Http\Controllers\Admin\User\CreateController::class)->name('admin.users.create');
       Route::post('/', \App\Http\Controllers\Admin\User\StoreController::class)->name('admin.users.store');
       Route::get('/{user}', \App\Http\Controllers\Admin\User\ShowController::class)->name('admin.users.show');
       Route::get('/edit/{user}',\App\Http\Controllers\Admin\User\EditController::class)->name('admin.users.edit');
       Route::patch('/{user}', \App\Http\Controllers\Admin\User\UpdateController::class)->name('admin.users.update');
       Route::delete('/{user}', \App\Http\Controllers\Admin\User\DestroyController::class)->name('admin.users.delete');
    });
});


Auth::routes(['verify' => true]);

