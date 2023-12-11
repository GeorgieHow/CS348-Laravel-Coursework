<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $posts = Post::paginate(10);
        return view ('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view ('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $validatedData = $request->validate([
            'post_title' => 'required|max:255',
            'post_text' => 'required|max:255',
        ]);

        return dd($request);
        /*
        $newPost = new Post;
        $newPost-> post_title = $validatedData['post_title'];
        $newPost-> post_text = $validatedData['post_text'];
        $newPost-> user_id = $request -> user()->id;
        $newPost-> created_at = now();
        $newPost->save();

        session()->flash('message', 'Post was successfully created.');
        return redirect()->route('posts.index');
        //dd($validatedData);*/
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $post = Post::findOrFail($id);
        //dd($post);
        return view ('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view ('posts.edit', ['post' => $post] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'post_title' => 'required|max:255',
            'post_text' => 'required|max:255',
        ]);

        $post = Post::findOrFail($id);
        //return dd($post);

        $post->post_title = $request->post_title;
        $post->post_text = $request->post_text;
        $post->save();

        return redirect()->route('posts.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        foreach($allComments=$post->comments as $comment){
            $comment->delete();
        };
        $post->delete();
        return redirect('/posts');
        //return dd($post);
    }
}
