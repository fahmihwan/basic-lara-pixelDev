@extends('layouts.frontend')

@section('custome-style')
    <style>
        .move-vertical-animations {
            transition: 0.2s
        }

        .move-vertical-animations:hover {
            transform: translateY(-10px)
        }

    </style>
@endsection


@section('content')
    <main>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach ($posts as $post)
                        <div class="col">
                            <div class="card shadow-sm move-vertical-animations">
                                <a href="{{ route('post.show', $post->slug) }}">
                                    {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                        preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <title>Placeholder</title>
                                        <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%"
                                            fill="#eceeef" dy=".3em">Thumbnail</text>
                                    </svg> --}}
                                    <img width="100%" height="225px" src="/storage/{{ $post->image }}" alt=""
                                        style="object-fit: cover">

                                </a>
                                <div class="card-body">
                                    <p class="card-text">{{ $post->description }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        {{-- <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                        </div> --}}
                                        <small class="text-muted">{{ $post->id }}</small>
                                        <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>

    </main>
@endsection
