@extends('layout.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-register">
            <h1 class="h3 mb-3 fw-normal text-center">Register Form</h1>
            <form action="/register" method="POST">
                @csrf
                <div class="form-floating">
                    <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" placeholder="Nama" required>
                    <label for="name">Nama</label>
                    @error ('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="text" name="username" class="form-control  @error('username') is-invalid @enderror" value="{{ old('username') }}" id="username" placeholder="username" required>
                    <label for="username">Username</label>
                    @error ('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" placeholder="Masukan email" required>
                    <label for="email">Email</label>
                    @error ('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="password" required>
                    <label for="password">Password</label>
                    @error ('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>

                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">Already Registered? <a href="/login">Login</a></small>
            <p class="mt-3 mb-3 text-muted text-center">&copy; 2022–2023</p>
        </main>
    </div>
</div>
@endsection