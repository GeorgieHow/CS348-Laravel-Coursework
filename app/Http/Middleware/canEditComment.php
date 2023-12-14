<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Comment;

class canEditComment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $commentID = $request->route('id');
        $comment = Comment::find($commentID);

        $user = auth()->user();

        if($user->id === $comment->user_id){
            if($user->can('edit-own-comment')){
                return $next($request);
            }
        }
        else{
            if($user->can('edit-comment')){
                return $next($request);
            }
        }

        return abort(403, 'Not allowed to carry out this action.');
    }
}
