<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\BlogContorller;

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
    return view('pages.home');
});

Route::get('/blogs', [BlogContorller::class, 'blogList']);
Route::get('/singleblog/{id}', [BlogContorller::class,'singleBlog']);

Route::get('/blog/{id}', [BlogContorller::class, 'blog']);

Route::post('comment-sotre', [BlogContorller::class, 'storeComment']);
Route::get('comments/{id}', [BlogContorller::class, 'comments']);
