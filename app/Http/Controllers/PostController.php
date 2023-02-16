<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \App\Models\Post;
use \App\Models\User;

class PostController extends Controller
{

    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstwhere('slug', request('category'));
            $title  = ' in ' . $category->name;
        }

        if (request('user')) {
            $user = User::firstwhere('username', request('user'));
            $title  = ' By ' . $user->name;
        }

        return view('post',[
            "title" => "All Postingan". $title,
            "active" => 'post',
            "post" => Post::latest()->filter(request(['cari', 'category', 'user']))->paginate(7)->withQueryString() //user sama dengan author

            // versi pertama nampilkan postingan
            // "post" => Post::all() menampilkan semua postingan
            // akhir

            // versi pertama dengan fungsi with eager loading laravel
            // Post::with(['author','category']) untuk eager loading penjelasan ada di doc laravel

            // "post" => Post::with(['user','category'])->latest()->get() 

            // fungi latest()->get() data diurutkan dari yang terbaru dengan fungsi latest()->get()
            // akhir
        
        ]);
        
    }

    public function detail(Post $post)
    {
        return view('detail', [
            "title" => "Detail",
            "active" => 'post',
            "post" => $post
        ]);
    }
}
