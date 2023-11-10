@extends('layouts.note')

@section('sidebar')
@foreach ($categories as $category)
<div class="container ms-3">
    <h6><a href="/category/{{$category->slug}}">{{$category->name}}</a></h6>

</div>
@endforeach

@endsection
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            @if ($note->user_id == auth()->user()->id)
            <h3>{{$note->title}}</h3>
            <small>{{$note->user->name}}</small>
            <div>{!! $note->body !!}</div>
            <div class="d-flex gap-4">
                <a href="/notes/edit/{{$note->slug}}" class="btn btn-success btn-sm">edit</a>
                <form action="/notes/delete/{{ $note->slug}}" method="POST">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure ?')">delete</button>
                </form>

            </div>

            @else
            <p>you not authorized.</p>

            @endif








        </div>
    </div>
</div>
@endsection