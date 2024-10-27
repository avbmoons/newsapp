<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\AboutController as AdminAboutController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\MailController as AdminMailController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Admin\NewsSourceController as AdminNewsSourceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\OrderController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

# Route::get('/hello/{name}', static function(string $name): string{return "Hello, {$name}";});

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function () {

    // Route::get('/admin', [AdminIndexController::class, 'index'])
    //     ->name('admin');

    Route::get('/', [AdminIndexController::class, 'index'])
        ->name('admin');

    Route::resource('categories', AdminCategoryController::class);

    Route::resource('news', AdminNewsController::class);

    Route::resource('newssources', AdminNewsSourceController::class);

    Route::resource('about', AdminAboutController::class);
    
    Route::resource('home', AdminHomeController::class);

    Route::resource('users', AdminUsersController::class);

    Route::resource('mails', AdminMailController::class);

    Route::resource('orders', AdminOrderController::class);

    Route::get('/admin/test1', [AdminIndexController::class, 'test1'])
        ->name('admin.test1');

        Route::get('/admin/test2', [AdminIndexController::class, 'test2'])
        ->name('admin.test2');
});

Route::view('about', 'about')    
    ->name('about');

Route::group(['prefix' => ''], static function () {

    Route::get('/news', [NewsController::class, 'index'])
        ->name('news');

        Route::get('/news/one/{id}', [NewsController::class, 'show'])
            ->where(name: 'id', expression: '\d+')->name("newsId");
});    

Route::group(['prefix' => ''], static function () {

    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('category.index');

    Route::get('/category/{slug}', [CategoryController::class, 'show'])
        ->where(name: 'category_id', expression: '\d+')->name('category.show');
});

// Route::group(['prefix' => ''], static function () {

//     Route::resource('mail', MailController::class);

//     Route::resource('order', OrderController::class);

// });

Route::resource('mail', MailController::class);

Route::resource('order', OrderController::class);





// Route::get('/news', [NewsController::class, 'index'])
// ->name('news');

// Route::get('/news/{id}/show', [NewsController::class, 'show'])
// ->where('id','\d+')
// ->name('news.show');