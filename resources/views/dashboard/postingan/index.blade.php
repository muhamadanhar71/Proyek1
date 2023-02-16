@extends('dashboard.layout-dashboard.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Postingan </h1>
</div>

<div class="table-responsive ">
    <a href="/dashboard/postingan/create" class="btn btn-primary mb-3">Tambah postingan</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($postingan as $postinganoutput)
            <tr>
                <td>{{ $loop->iteration }}</td> {{-- fungsi dari laravel $loop->iteration untuk penomoran otomatis ada
                di dokumentasi laravel bagian loops --}}
                <td>{{ $postinganoutput->title }}</td>
                <td>{{ $postinganoutput->category->name }}</td>
                <td>
                    <a href="/dashboard/postingan/{{ $postinganoutput->slug }}" class="badge btn-success">
                        <span data-feather="eye"></span> {{-- data-feather itu dari icon website /feathericons.com harus
                        import javascriptnya dahulu--}}
                    </a>
                    <a href="/dashboard/postingan/{{ $postinganoutput->slug }}/edit" class="badge btn-warning">
                        <span data-feather="edit"></span> {{-- data-feather itu dari icon website /feathericons.com
                        harus import javascriptnya dahulu--}}
                    </a>
                    
                    {{-- //action hapus data postingan --}}
                    <form action="/dashboard/postingan/{{ $postinganoutput->slug }}" method="POST" class="d-inline"> {{-- class="d-inline" untuk button yang blok elemen supaya sebaris --}}
                        @csrf
                        @method('DELETE') {{-- ini metode bawaan untuk menghapus data --}}
                        <button class="badge btn-danger border-0" ><span data-feather="x-circle"></span></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection