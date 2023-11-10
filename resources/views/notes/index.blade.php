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
  <div class="row ">
    <div class="col-md-6">

      <div>
        @foreach ($notes as $note)
        <h4><a href="/notes/{{$note->slug}}" class="text-decoration-none text-dark">{{$note->title}}</a></h4>

        @endforeach
      </div>

    </div>
  </div>
</div>


@endsection