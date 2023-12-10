<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Post;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Test Tag
        /*
        $tag1 = new Tag;
        $tag1->tag_name = "Cooking";
        $tag1->save();

        $tag2 = new Tag;
        $tag2->tag_name = "Sports";
        $tag2->save();

        //Attaching random posts to the tag
        $tag1->posts()->attach(1);

        $tag1->posts()->attach(14);
        $tag2->posts()->attach(14);
        */

        Tag::factory()->count(10)->create();
        $tags = Tag::all();

        //Getting all posts and attaching 2 random tags to each
        Post::all()->each(function ($post) use ($tags){
            $post->tags()->attach(
                $tags->random(rand(1,3))->pluck('id')->toArray()
            );
        });
    }
}
