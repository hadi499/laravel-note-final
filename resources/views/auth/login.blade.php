@extends('layouts.welcome')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <h3 class="text-center">Login</h3>
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show " role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="/login" method="POST" class="p-3 shadow mt-3">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email')is-invalid @enderror" id="email"
                        name="email">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" name="password"
                        placeholder="Password" required>

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <small class="d-block text-center mt-3">Not registered? <a href="/register">Register now!</a></small>
        </div>
    </div>
</div>
@endsection