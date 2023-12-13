<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Post;

class canDeletePost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $postID = $request->route('id');
        $post = Post::find($postID);

        $user = auth()->user();

        if($user->id === $post->user_id){
            if($user->can('delete-own-post')){
                return $next($request);
            }
        }
        else{
            if($user->can('delete-post')){
                return $next($request);
            }
        }

        return abort(403);
    }
}
