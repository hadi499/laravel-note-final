@extends('layouts.note')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <form action="/notes/edit/{{$note->slug}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control  @error('title')is-invalid @enderror" id="title" name="title"
                        value="{{$note->title}}" autofocus>
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slug')is-invalid @enderror" id="slug" name="slug"
                        value="{{ $note->slug}}">
                    @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" name="category_id">

                        @foreach ($categories as $category)
                        @if (old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label ">Body</label>
                    @error('body')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                    <textarea name="body" id="editor" value="{{$note->body}}">{{$note->body}}</textarea>


                </div>


                <button type="submit" class="btn btn-primary mb-5">Update</button>
            </form>

        </div>
    </div>
</div>


<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');
    
    title.addEventListener('change', function(){
      fetch('/notes/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

</script>



@endsection