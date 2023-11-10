@extends('layouts.note')

@section('content')
<div class="container">
    <div class="row j">
        <div class="col-md-6">

            @foreach ($images as $image)
            <div class="d-flex gap-3 align-items-center justify-content-center mt-5">

                <img src="/media/{{$image->image}}" alt="" style="width: 200px;height:200px">
                {{-- <a href="/delete-file/{{$image->id}}"
                    onclick="return confirm('Are you sure delete this image ?')">delete</a> --}}
                <form action="/delete-file/{{$image->id}}" method="POST">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')">delete</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection