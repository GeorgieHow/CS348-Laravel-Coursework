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
        $tag = new Tag;
        $tag->tag_name = "Cooking";
        $tag->save();

        //Attaching random posts to the tag
        $tag->posts()->attach(1);
        $tag->posts()->attach(14);

    }
}
