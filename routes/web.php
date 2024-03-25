<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostsController;
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
Auth::routes();

Route::get('/', function () {
    // 화면으로 이동
    return view('Posts.index');
});

// Route::get('/blogs', function () {
//     return view('Posts.blog_list');
// });
Route::get('/blogs', [PostsController::class, 'index']);
Route::get('/blogs/create', [PostsController::class, 'create']);
Route::post('/blogs', [PostsController::class, 'store']);
Route::get('/blogs/{post}', [PostsController::class, 'show']);
Route::get('/blogs/{post}/edit', [PostsController::class, 'edit']);
Route::put('/blogs/{post}', [PostsController::class, 'update']);
Route::delete('/blogs/{post}', [PostsController::class, 'destroy']);

Route::post('/comment', [CommentsController::class, 'store'])->name('comment.add');
Route::delete('/comment/{comment}', [CommentsController::class, 'destroy']);

Route::get('/post/{id}/islikedbyme', [PostController::class, 'isLikedByMe']); //  좋아요 횟수
Route::post('/post/{post}/like', [PostController::class, 'like']);    // 좋아요 처리

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
