@extends('layouts.note')

@section('sidebar')





@endsection
@section('content')
<div class=" container mt-5">
    <div class="row ">
        <div class="col-md-6">
            @foreach ($categories as $category)

            @foreach ($category->notes as $note)
            <p>{{$note->title}}</p>

            @endforeach

            @endforeach

            {{-- @foreach ($notes as $note)
            <p> {{$note->title}}</p>

            @endforeach --}}

        </div>
    </div>
</div>
@endsection