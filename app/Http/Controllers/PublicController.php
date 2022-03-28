<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PublicController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->get();
        return view('public.post.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('public.post.show', [
            'show' => $post
        ]);
    }
}