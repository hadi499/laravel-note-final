@extends('layouts.note')

@section('sidebar')
@foreach ($categories as $category)
<div class="container ms-3">
  <h6><a href="/category/{{$category->slug}}">{{$category->name}}</a></h6>
</div>
@endforeach

@endsection

@section('content')
<div class="container mt-3">
  <div class="row ">
    <div class="col-md-6">
      <div class="col-md-8">
        <form action="/notes">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search.." name="search"
              value="{{ request('search') }}">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
          </div>
        </form>

        <div class="mt-5">
          @foreach ($notes as $note)
          <h5><a href="/notes/{{$note->slug}}" class="text-decoration-none text-dark">{{$note->title}}</a></h5>

          @endforeach
        </div>

      </div>
    </div>
  </div>


  @endsection