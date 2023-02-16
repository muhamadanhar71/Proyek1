@extends('layout.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-4">

        @if (session()->has('success'))
            <script>
                alert("{{ session('success') }}");
            </script>
        @endif

        @if (session()->has('loginerror'))
            <script>
                Swal.fire({
                icon: 'error',
                title: 'Login Gagal !',
                showConfirmButton: false,
                timer: 2000
                })
            </script>
        @endif

        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
            <form action="/login" method="post">
                @csrf
                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-3">Not registred? <a href="/register">Register now!</a></small>
            <p class="mt-3 mb-3 text-muted text-center">&copy; 2022–2023</p>
        </main>
    </div>
</div>
@endsection