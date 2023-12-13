<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersRole = Role::create(['name' => 'registered-user']);
        $adminRole = Role::create(['name' => 'admin']);

        $viewPosts = Permission::create(['name' => 'view-posts']);
        $createPost = Permission::create(['name' => 'create-post']);

        $editPost = Permission::create(['name' => 'edit-post']);
        $deletePost = Permission::create(['name' => 'delete-post']);
        $addComments = Permission::create(['name' => 'add-comments']);
        $editComment = Permission::create(['name' => 'edit-comment']);
        $deleteComment = Permission::create(['name' => 'delete-comment']);

        $editOwnPost = Permission::create(['name' => 'edit-own-post']);
        $editOwnComment = Permission::create(['name' => 'edit-own-comment']);
        $deleteOwnPost = Permission::create(['name' => 'delete-own-post']);
        $deleteOwnComment = Permission::create(['name' => 'delete-own-comment']);

        //Gives admin role ability to do everything
        $adminRole->givePermissionTo($viewPosts);
        $adminRole->givePermissionTo($createPost);
        $adminRole->givePermissionTo($editPost);
        $adminRole->givePermissionTo($deletePost);
        $adminRole->givePermissionTo($addComments);
        $adminRole->givePermissionTo($editComment);
        $adminRole->givePermissionTo($deleteComment);

        $usersRole->givePermissionTo($editOwnPost);
        $usersRole->givePermissionTo($editOwnComment);
        $usersRole->givePermissionTo($deleteOwnPost);
        $usersRole->givePermissionTo($deleteOwnComment);


        $users = User::all();
        foreach($users as $user) {
            $user->assignRole($usersRole);
        }

        $admin = User::find(1);
        $admin->assignRole($adminRole);

    }
}
