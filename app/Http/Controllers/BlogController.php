<?php

namespace App\Http\Controllers;

use App\Post;

class BlogController extends Controller
{

    public function  __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    //anybody can view the posts
    public function index()
    {
        $posts = Post::latest()
                ->filter(request(['month','theyear']))
                ->get();

        return view('newBlog.index', compact('posts'));
    }

    public function create()
    {
        return view('newblog.create');
    }

    public function store()
    {
        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required'
        ]);

        Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

//        Post::create(request(['title','body']));

        //and the redirect to the home page
        return redirect()->home();
    }

    public function show(Post $post)
    {
        return view('newBlog.show', compact('post'));

    }
}
