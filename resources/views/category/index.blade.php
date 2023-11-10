@extends('layouts.note')

@section('sidebar')
@section('sidebar')
{{-- @foreach ($categories_user as $category)
<div class="container ms-3">
    <h6><a href="/category/{{$category->slug}}"
            class="text-decoration-none text-dark {{ $category->slug == $slug ? 'klik' : '' }}">{{$category->name}}</a>
    </h6>

</div>
@endforeach --}}


@endsection
@endsection
@section('content')
<div class="mb-3 ms-3 mt-5">
    <a href="/category/create" class="btn btn-sm btn-outline-dark text-decoration-none">Add New Category</a>
</div>
<div class=" container mt-5">
    <div class="row ">
        <div class="col-md-5">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show " role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">User</th>
                        <th scope="col">Category Id</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$loop->iteration}}.</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>{{$category->user->name}}</td>
                        <td class="text-center">{{$category-> id}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>


        </div>
    </div>
</div>
@endsection