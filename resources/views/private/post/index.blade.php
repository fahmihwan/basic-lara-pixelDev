@extends('layouts.app')

@section('content')
    <div class="container ">

        @if (session()->has('message'))
            <div class="alert alert-success" role="alert">{{ session()->get('message') }}</div>
        @endif

        <div class="card">
            <div class="card-body ">
                <div class="d-flex justify-content-between">
                    <div class="card-title">Your Post</div>
                    <a href=" {{ route('post.create') }}" class="btn btn-primary ">Create a new post</a>
                </div>
                @forelse ($posts as $post)
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="" width="125px" height=" 75px"
                                style="object-fit: cover" class="me-2">
                            <div class="mt-3">
                                <p>{{ $post->title }}</p>
                                <p class="text-muted"> {{ $post->created_at->format('Y-m-d ') }} &middot;
                                    {{ $post->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex">
                                <a href="/post/edit/{{ $post->slug }} " class="btn btn-warning me-2">Edit</a>
                                <form action="/post/destroy/{{ $post->slug }}" method="POST">
                                    @method('delete ')
                                    @csrf
                                    <button class="btn btn-danger">Del</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-danger mt-5" role="alert">
                        You don't have any posts
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
