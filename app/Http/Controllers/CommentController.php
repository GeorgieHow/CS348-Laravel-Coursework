<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Notifications\PostCommentedOn;
use App\Notifications\MutualComments;
use Illuminate\Support\Facades\Notification;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $comments = Comment::paginate(10);
        return view ('comments.index', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(String $id)
    {
        //return dd($id);
        return view ('comments.create', ['post' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, String $id)
    {
        
        $validatedData = $request->validate([
            'comment_text' => 'required|max:255',
        ]);

        $newComment = new Comment;
        $newComment-> comment_text = $validatedData['comment_text'];
        $newComment-> post_id = $id;
        $newComment-> user_id = $request->user()->id;
        $newComment-> created_at = now();
        $newComment->save();

        //Emails the owner of the post.
        $postOwner = $newComment->post->user;
        $postID = $newComment->post->id;
        $postOwner->notify(new PostCommentedOn($postID));

        //Emails the commenters on the post.
        $post = $newComment->post;
        $comments = $post->comments;
        $userArray = [];

        foreach($comments as $comment){
            $user = $comment->user;
            if(!in_array($user, $userArray)){
                $userArray[] = $user;
            }
        }

        Notification::send($userArray, new MutualComments($postID));

        session()->flash('created', 'Comment was successfully created.');
        return redirect()->route('posts.show', ['id' => $id]);
        //dd($validatedData);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $comment = Comment::findOrFail($id);
        //dd($comment);
        return view ('comments.show', ['comment' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, string $id2)
    {
        $comment = Comment::findOrFail($id);
        $post = Post::findOrFail($id2);
        return view ('comments.edit', ['comment' => $comment, 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'comment_text' => 'required|max:255',
        ]);

        $comment = Comment::findOrFail($id);
        //return dd($comment);
        $postid = $comment->post_id;

        $comment->comment_text = $request->comment_text;
        $comment->save();

        return redirect()->route('posts.show', ['id' => $postid]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id);
        $postid = $comment->post_id;
        $comment->delete();
        //return dd($comment);
        return redirect()->route('posts.show', ['id' => $postid]);
    }
}
