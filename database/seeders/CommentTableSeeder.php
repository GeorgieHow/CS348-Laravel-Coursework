<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //Test Comment
        $comment = new Comment;
        $comment->comment_text='This is a test comment.';
        $comment->user_id=1;
        $comment->post_id=1;
        $comment->save();

        Comment::factory()->count(30)->create();

    }
}
