<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::delete('/posts/{postId}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');
Route::get('/posts/{postId}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::put('/posts/{post}', [PostController::class,'update'])->name('posts.update')->middleware('auth');
Route::get('/posts/{post}/edit', [PostController::class,'edit'])->name('posts.edit')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('auth.github');

Route::get('/auth/callback', function () {
    // dd('we are in callback');
    $user = Socialite::driver('github')->user();
    dd($user);

    // $user->token
});

Route::get('auth/google/redirect', 'Auth\GoogleController@redirect');
Route::get('auth/google/callback', 'Auth\GoogleController@callback');

// Route::get('auth/google', [GoogleController::class,'redirect']);
// Route::get('auth/google/callback', [GoogleController::class,'callback']);
