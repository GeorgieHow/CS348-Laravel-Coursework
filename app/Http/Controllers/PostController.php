<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Paginates Posts
        $posts = Post::paginate(5);

        //Using Pokemon API
        $getRandNumber = rand(1,897);
        $response = 
        Http::get('https://pokeapi.co/api/v2/pokemon/'. $getRandNumber );

        //Gets image for the pokemon
        $pokemon = $response->json();

        $pokemonImage = 
        'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/'.$getRandNumber.'.png';

        return view ('posts.index', ['posts' => $posts, 'pokemon' => $pokemon,
        'pokemonImage' => $pokemonImage]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view ('posts.create', ['tags' => $tags]);
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

        //tags
        $tagsFromString = $request->tags;
        $tagsForm = json_decode($tagsFromString, true);

        if($tagsForm != NULL){
            foreach($tagsForm as $tag){
                $tagRecord = Tag::where('tag_name', $tag)->first();
                $newTagArray[] = $tagRecord;
            }
        }

        $newPost = new Post;
        $newPost-> post_title = $validatedData['post_title'];
        $newPost-> post_text = $validatedData['post_text'];
        $newPost-> user_id = $request -> user()->id;
        $newPost-> created_at = now();
        $newPost->save();

        if($tagsForm != NULL){
            foreach($newTagArray as $tag){
            $newPost->tags()->attach($tag);
            }
        }
        session()->flash('created', 'Post was successfully created.');
        return redirect()->route('posts.index');
        //dd($validatedData);
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

        session()->flash('edited', 'Post was successfully edited.');
        return redirect()->route('posts.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        //Destroys comments on post
        foreach($allComments=$post->comments as $comment){
            $comment->delete();
        };
        //Detaches tags from post
        foreach($allTags=$post->tags as $tag){
            $post->tags()->detach($tag);
        }
        $post->delete();
        return redirect('/posts');
        //return dd($post);
    }
}
