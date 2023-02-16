<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

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

//halaman Home
Route::get('/', function () {
    return view('home',[
        "title" => "Home",
        'active' => "home",
    ]);
});

//halaman about
Route::get('/about', function () {
    return view('about',[
        "title" => "About",
        'active' => "about",
        "nama" => "Muhamad anhar",
        "email" => "muhamadanhar@gmail.com"
    ]);
});


Route::get('/post', [PostController::class, 'index']);
Route::get('post/{post:slug}', [PostController::class, 'detail']);

//halaman categories
Route::get('/categories', function(){
    return view ('categories', [
        'title' => 'Post Category',
        'active' => "categories",
        'categories'=> Category::all()
    ]);
});

//halaman detail
// Route::get('/categories/{category:slug}', function (Category $category){
//     return view ('post', [
//         'title' => "Post by Category : $category->name",
//         'active' => "categories",
//         'post'=> $category->post->load('category','user'),
//     ]);
// });

// {user:username} perintah untuk mengganti url dari nomor id ke username pengguna
//perintah function(User $user) route model bundling/ mengarah ke model 

// Versi pertama
// Route::get('/authors/{user:username}', function(User $user) {  
//     return view ('post', [
//         'title' => "Post by Author : $user->name",
//         'active' => 'post',
//         'post'=> $user->post->load('category','user')
//         load('') pake leazy eager loading ada di doc laravel
//     ]);
// });
// akhir versi pertama

// Versi kedua
// Route::get('/authors/{author:username}', function(User $author) { 
//     return view ('post', [
//         'title' => "Post by Author : $author->name",
//         'post'=> $author->post
//     ]);
// });
// akhir versi kedua

// $user sama saja dengan $author hanya penamaan

Route::get('/register',[RegisterController::class, 'index']) ->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);

// disable back setelah login atau logout
Route::group(['middleware' => 'disable_back_btn'], function(){
    Route::post('/login',[LoginController::class, 'authenticate']);
    // membaca fungsi route = jika ada Request ke url contoh login yang method nya get jalankan [LoginController::class, 'index']) atau controler
    // contoh pake route controller
    Route::get('/login',[LoginController::class, 'index']) ->name('login') ->middleware('guest'); //fungsi middleware untuk membaca sudah login atau belum cek dok laravel
    Route::post('/logout',[LoginController::class, 'logout']);
    // akhir contoh pake route controller

    // route ada/bisa pake closure dan controler
    // contoh pake route closure
    Route::get('/dashboard', function() {
        return view('dashboard.index');
    }) ->middleware('auth');
    //akhir contoh pake route closure

    // Route untuk slug otomatis tidak boleh di harus di atas
    Route::get('/dashboard/postingan/checkSlug', [DashboardPostController::class, 'checkSlug'])
    ->middleware('auth'); 
    // akhir route slug otomatis harus di atas yang ini

    Route::resource('/dashboard/postingan', DashboardPostController::class)->middleware('auth');
});
