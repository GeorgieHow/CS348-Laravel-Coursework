<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Example Profile
        $profile = new Profile;
        $profile->profile_bio = "This is a profile bio.";
        $profile->save();

        Profile::factory() -> count(20) -> create();
    }
}
