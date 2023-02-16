@extends('dashboard.layout-dashboard.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Postingan </h1>
</div>
<div class="col-lg-8 ">
    <form action="/dashboard/postingan" method="POST" class="mb-5">
        @csrf {{-- penting jika pake form --}}
        <div class="mb-3">
            <label for="title" class="form-label">title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror " id="title" name="title" required autofocus value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}  {{-- untuk menampilkan pesan erronya --}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" required value="{{ old('slug') }}">
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                <option selected disabled>- Pilih Category -</option>
                @foreach ($categories as $category)
                    @if (old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else 
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Category</label>
            @error('body')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
            <trix-editor input="body"></trix-editor> {{-- form input ngambil dari trix editor  --}}
        </div>

        <button type="submit" class="btn btn-primary">Tambah postingan baru</button>
        <a href="/dashboard/postingan" class="btn btn-danger float-end"> Kembali</a>
    </form>
</div>
{{-- api untuk slug otomatis--}}
<script>
    const title = document.querySelector('#title');
        const slughasil = document.querySelector('#slug');
    
        title.addEventListener('change', function(){
          fetch('/dashboard/postingan/checkSlug?title=' + title.value )
          .then(response => response.json())
          .then(data => slughasil.value = data.slug)
        })

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })
</script>
{{-- api untuk slug otomatis--}}

@endsection