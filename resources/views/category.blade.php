@extends('layouts.note')

@section('sidebar')
<div class="container mt-4 ms-3">

</div>

@endsection
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">


            <div>
                @foreach ($notes as $note)
                <h4><a href="/notes/{{$note->slug}}">{{$note->title}}</a></h4>
                @endforeach
            </div>



        </div>
    </div>
</div>
@endsection