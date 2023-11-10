@extends('layouts.note')

@section('sidebar')

@endsection

@section('content')
<div class="container mt-5">
    <div class="row ">
        <div class="col-md-6">

            <div>
                @foreach ($categories as $category)
                <div class="container ms-3">
                    <h6><a href="/categories/{{$category->slug}}">{{$category->name}}</a></h6>

                </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection