<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Profile;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //Example User
        $user = new User;
        $user->name = 'FirstUser';
        $user->email = 'firstuser@example.com';
        $user->password = 'password';
        $user->save();

        //Generates 20 random users, then generates 2 random posts linked to them
        User::factory()->count(20)
        ->has(Profile::factory())
        ->has(Post::factory()->count(2))
        ->create();
    }
}
