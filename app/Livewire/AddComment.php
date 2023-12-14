<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Post;
use App\Notifications\PostCommentedOn;
use App\Notifications\MutualComments;
use Illuminate\Support\Facades\Notification;

class AddComment extends Component
{
    public $post;
    public $comment;

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.add-comment', [
            'comments' => $this->post->comments,
    ]);
    }

    public function addComment()
    {
        //return dd($this->post->comments);
        //return dd($this);
        $this->validate([
            'comment' => 'required|max:255',
        ]);

        $newComment = new Comment;
        $newComment-> comment_text = $this->comment;
        $newComment-> post_id = $this->post->id;
        $newComment-> user_id = auth()->user()->id;
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

        session()->flash('comment-created', 'Comment was successfully created.');

        $this->comment = ''; // Clear the input field

    }
}
