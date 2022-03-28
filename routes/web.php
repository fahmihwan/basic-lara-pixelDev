<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [PublicController::class, 'index'])->name('post.index');

Route::get('/post/show/{post}', [PublicController::class, 'show'])->name('post.show');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// cara menggunakan route group Middleware(authentikasi):
// 1. bisa di taruh di constructor controller
// 2. bisa di taruh di routing web.php seperti di bawah ini
Route::group(['middleware' => 'auth'], function () {
    Route::get('/post', [PostController::class, 'index'])->name('post');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/update/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/destroy/{post}', [PostController::class, 'destroy'])->name('post.destroy');
});
