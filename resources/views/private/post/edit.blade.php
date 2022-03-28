@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center ">
        <div class="card w-50 ">
            <div class="card-header">Edit Post - {{ $post->title }}</div>
            <div class="card-body">
                <form action="/post/update/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title">title</label>
                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title"
                            value="{{ $post->title }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="category">category</label>
                        <select id="category" class="form-control" name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id == $post->category_id) selected @endif>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="image">image</label>
                        <input type="file" id="image" class="form-control" name="image">
                    </div>
                    <div class=" form-group mb-3  ">
                        <label for="description">description</label>
                        <textarea id="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror"
                            name="description">{{ $post->description }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update </button>
                </form>
            </div>
        </div>
    </div>
@endsection
