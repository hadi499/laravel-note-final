@extends('layouts.note')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <h3 class="text-center">Add Category</h3>
            <form action="/category/create" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" name="name"
                        required autofocus>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug')is-invalid @enderror" id="slug" name="slug"
                        required>
                    @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection