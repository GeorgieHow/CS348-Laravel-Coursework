<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        Blade::if('canEditPost', function($post){
            $user = auth()->user();

            $editOwnPost = ($user->hasPermissionTo('edit-own-post')) 
            && ($user->id == $post -> user_id);

            $adminEditPost = ($user->hasPermissionTo('edit-post'));

            return ($editOwnPost || $adminEditPost);
        });

        Blade::if('canDeletePost', function($post){
            $user = auth()->user();

            $deleteOwnPost = ($user->hasPermissionTo('delete-own-post')) 
            && ($user->id == $post -> user_id);

            $adminDeletePost = ($user->hasPermissionTo('delete-post'));

            return ($deleteOwnPost || $adminDeletePost);
        });

        Blade::if('canEditComment', function($comment){
            $user = auth()->user();

            $editOwnComment = ($user->hasPermissionTo('edit-own-comment')) 
            && ($user->id == $comment -> user_id);

            $adminEditComment = ($user->hasPermissionTo('edit-comment'));

            return ($editOwnComment || $adminEditComment);
        });

    }
}
