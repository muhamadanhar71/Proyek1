<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str; 
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller

// NOTE
// 1. index = menampilkan view halaman postingan
// 2. create = untuk membuat/menampilkan halaman tambah data
// 3. store = untuk proses menambahkan data/ proses nya
// 4. show = untuk membuat/menampilkan halaman lihat/detail postingan
// 5. edit = untuk membuat/menampilkan halaman edit data postingan
// 6. update = untuk proses edit data nya/ proses nya
// 7. destroy = proses menghapus data

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.postingan.index', [
            'postingan' => Post::where('user_id', auth()->user()->id)->get()
            // NOTE $postingan di ambil dari sini
        ]);
 
    } 
    // NOTE $postingan di ambil dari sini

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.postingan.tambah', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasidata = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts', //posts nama tabel di database
            'category_id' => 'required',
            'body' => 'required'
        ]);

        $validasidata['user_id'] = auth()->user()->id;
        $validasidata['excerpt'] = Str::limit(strip_tags( $request->body), 200);

        Post::create($validasidata);

        return redirect('/dashboard/postingan') -> with('success', 'Postingan baru sudah di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    // NOTE $postingan di ambil dari 
    // 'postingan' => Post::where('user_id', auth()->user()->id)->get()
    // ada di public function index di paling atas
    public function show(Post $postingan) 
    {
        if($postingan->user->id !== auth()->user()->id) {
            abort(403);
        };

        return view('dashboard.postingan.lihat',[
            'lihat' => $postingan
        ]);

        
    }

    // $postingan diambil dari 
    // public function index()
    // {
    //     return view('dashboard.postingan.index', [
    //         'postingan' => Post::where('user_id', auth()->user()->id)->get()
    //     ]);
 
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $postingan)
    {
        if($postingan->user->id !== auth()->user()->id) {
            abort(403);
       };
        return view('dashboard.postingan.edit', [
            'postingan' => $postingan,
            'categories' => Category::all(),
        ]);

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $postingan)
    {

        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required'
        ];

        $validasidata = $request->validate($rules);

        $validasidata['user_id'] = auth()->user()->id;
        $validasidata['excerpt'] = Str::limit(strip_tags( $request->body), 200);

        // perintah update data ada dua cara

        //cara ke-1:
        Post::where('id', $postingan->id) -> update($validasidata);

        // cara ke-2:
        // $postingan->update($validasidata);

        return redirect('/dashboard/postingan') -> with('success', 'Postingan sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    // NOTE $postingan di ambil dari 
    // 'postingan' => Post::where('user_id', auth()->user()->id)->get()
    // ada di public function index di paling atas
    public function destroy(Post $postingan)
    {
        Post::destroy($postingan->id); //$post itu tabel database -> id menunjukan nomor data 

        return redirect('/dashboard/postingan') -> with('Data Deleted successfully');

    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
