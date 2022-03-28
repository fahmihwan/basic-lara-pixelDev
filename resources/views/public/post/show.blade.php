@extends('layouts.frontend')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <h1>{{ $show->title }}</h1>
                <p class="text-muted">{{ $show->created_at->format('d m Y') }} Created By {{ $show->user_id }}
                    <a href="#">{{ $show->category_id }} </a>
                </p>

            </div>
        </div>
        <div class="row">
            <div class="col-md-11  mx-auto d-flex justify-content-center">
                {{-- <div class="w-75 bg-secondary " style="height:500px; border-radius:20px"></div> --}}
                <img src="/storage/{{ $show->image }}" width="750px" height="500px" alt=""
                    style="object-fit: cover; border-radius:20px">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto mt-4">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus iste nesciunt ut corporis voluptate.
                    Amet tenetur quod in magni assumenda aut, repudiandae dolor temporibus voluptatem velit veniam dolores
                    facere ab?</p>
            </div>
        </div>
    </div>
@endsection
