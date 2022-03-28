<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\FuncCall;

class PostController extends Controller
{

    public function __construct()
    {
        $this->postModel = new Post();
        $this->categories = new Category();
    }

    public function index()
    {
        $posts = $this->postModel->getPostFromUser(auth()->user()->id);
        return view('private.post.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('private.post.create', [
            'categories' => $this->categories->getCategories()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:4096',
            'description' => 'required',
        ]);

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('post-images');
        }

        $validated['slug'] = Str::slug($request->title);
        $validated['user_id'] = auth()->user()->id;


        Post::create($validated);
        return redirect('/post')->with('message', 'data berhasil di ditambahkan');
    }

    public function edit(Post $post)
    {
        return view('private.post.edit', [
            'post' => $post,
            'categories' => $this->categories->getCategories(),
        ]);
    }

    public function update(Post $post, Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:4096',
            'description' => 'required',
        ]);

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('post-images');
        }

        $validated['slug'] = Str::slug($request->title);

        $post->update($validated);

        // $request->session()->flash('key', $value);  <=== default
        return redirect('/post')->with('message', 'data berhasil di update');
    }

    public function destroy(Post $post)
    {
        Storage::delete($post->image);
        $post->delete();
        return redirect()->back()->with('message', 'data berhasil di hapus');
    }
}
