@extends('layout.main')

@section('container')

<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row mb-3 justify-content-center">
    <div class="col-md-6">
        <form action="/post">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('user'))
                <input type="hidden" name="user" value="{{ request('user') }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari.."
                    name="cari" value="{{ request('cari') }}">
                <button class="btn btn-outline-warning" type="submit" >Cari</button>
            </div>
        </form>
    </div>
</div>
{{-- jika ada postingan tampilkan card dengan percabangan if blade laravel --}}
@if ($post -> count())
<div class="card mb-3">
    <img src="https://source.unsplash.com/1200x400/?{{ $post[0]->category->name }}" class="card-img-top"
        alt="{{ $post[0]->category->name }}">
    <div class="card-body text-center">
        <h2 class="card-title"><a href="/post/{{ $post[0]->slug }}" class="text-decoration-none text-dark">{{
                $post[0]->title }}</a></h2>

        <p>
            <small class="text-muted">
                By.
                <a href="/post?user={{ $post[0]->user->username }}" class="text-decoration-none">{{ $post[0]->user->name
                    }}</a>
                in
                <a href="/post?category={{ $post[0]->category->slug }}"
                    class="text-decoration-none">{{$post[0]->category->name }}</a>
                {{ $post[0]->created_at->diffforhumans() }} {{-- diffforhumans() mengubahtanggal-bulan-tahunkeberapajam
                --}}
            </small>
        </p>
        <p class="card-text">{{ $post[0]->excerpt }}</p>

        <a href="/post/{{ $post[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
    </div>
</div>


<div class="container">
    <div class="row">
        @foreach ($post->skip(1) as $post1)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.6)"><a
                        href="/post?category={{ $post1->category->slug }}" class="text-decoration-none text-white">{{
                        $post1->category->name }}</a></div>
                <img src="https://source.unsplash.com/500x300/?{{ $post1->category->name }}" class="card-img-top"
                    alt="{{ $post1->category->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $post1->title }}</h5>
                    <p>
                        <small class="text-muted">
                            By.
                            <a href="/post?user={{ $post1->user->username }}" class="text-decoration-none">{{
                                $post1->user->name }}
                            </a>
                            {{ $post1->created_at->diffforhumans() }} {{-- diffforhumans()
                            mengubahtanggal-bulan-tahunkeberapajam--}}
                        </small>
                    </p>
                    <p class="card-text">{{ $post1->excerpt }}</p>
                    <a href="/post/{{ $post1->slug }}" class="btn btn-primary">Reed more</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
{{-- else kondisi jika tidak ada postingan --}}
@else
<p class="text-center fs-4">Tidak ada postingan.</p>
@endif
{{-- akhir --}}

{{-- Buat pagination --}}
<div class="d-flex justify-content-end">
    {{ $post->links() }}

</div>
{{-- akhir Buat pagination --}}

@endsection