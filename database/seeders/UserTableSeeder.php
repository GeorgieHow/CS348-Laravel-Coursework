<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = new User;
        $user->name = 'FirstUser';
        $user->email = 'firstuser@example.com';
        $user->password = 'password';
        $user->save();

        User::factory()->count(10)->create();
    }
}
