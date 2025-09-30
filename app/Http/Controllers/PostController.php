<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(3);
        return view('posts.index', ['posts' => $posts]);
    }

   
    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        //validation
        $request->validated();
        //make new image name
        $imageName = 'Blog_'.time().'.'.$request->image->extension();
        //upload image into storage
        $request->file('image')->storeAs('images/blog/posts', $imageName, 'public');
        //store into database
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $imageName
        ]);
        //return
        return back()->with('success', 'Post created successfully');
    }
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }
    
}
