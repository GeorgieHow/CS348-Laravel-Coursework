<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $post = new Post;
        $post->post_title='This is the post title.';
        $post->post_text='This is the text of the post. Blah blah blah.';
        $post->user_id=1;
        $post->save();
    }
}
