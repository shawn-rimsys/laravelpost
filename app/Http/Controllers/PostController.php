<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(10);
        $user = auth()->user();

        return view('posts.index', compact('posts','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        return view('posts.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);
        $user = auth()->user();
        $post = new Post([
            'title'=>$request->get('title'),
            'content'=>$request->get('content'),
            'author_id'=>$user->name
        ]);
        $post->save();
        return redirect('/posts')->with('success', 'Post saved!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $user = auth()->user();
        return view('posts.edit', compact("post","user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);
        $user = auth()->user();
        $post = Post::find($id);
        $post->author_id = $user->name;
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->save();

        return redirect('/posts')->with('success', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('/posts')->with('success', 'Post deleted!');
    }

    public function welcome()
    {
        $user = auth()->user();
        // $posts = Post::all()->where('author_id', $user->name);
        $posts = Post::orderBy('created_at','desc')->paginate(5);
        return view('posts.main',compact("user","posts"));
    }

    public function addpost(){
        $user = auth()->user();
        return view('posts.addpost',compact('user'));
    }

}
