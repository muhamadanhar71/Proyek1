@extends('dashboard.layout-dashboard.main')

@section('container')
<div class="container">
    <div class="row my-3 ">
        <div >
            <h1 class="mb-3 text-center">{{ $lihat->title }}</h1>

                    <a href="/dashboard/postingan/{{ $lihat->slug }}/edit" class="btn btn-warning text-decoration-none"><span data-feather="edit"></span> Edit</a>

                    {{-- //action hapus data postingan --}}
                    <form action="/dashboard/postingan/{{ $lihat->slug }}" method="POST"  class="d-inline"> {{-- class="d-inline" untuk button yang blok elemen supaya sebaris --}}
                        @csrf
                        @method('DELETE') {{-- ini metode bawaan untuk menghapus data --}}
                        <button class="btn btn-danger " onclick="return confirm('Hapus data?')"><span data-feather="x-circle"></span> Hapus</button>
                    </form>

                    <a href="/dashboard/postingan " class="btn btn-primary text-decoration-none float-md-end"><span data-feather="arrow-left"></span> Kembali</a>

            <img  src="https://source.unsplash.com/1200x400/?{{ $lihat->category->name }}" alt="{{ $lihat->category->name }}" class="img-fluid mt-3">

            <article class="my-3 mb-5" style="text-align:justify; ">
                {!! ($lihat->body) !!}
            </article>

        </div>
    </div>
</div>
@endsection