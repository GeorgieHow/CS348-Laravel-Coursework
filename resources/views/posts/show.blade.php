@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
    @vite('resources/css/app.css')
    <div class="bg-gray-600">
    <ul>
        <li><p class="bg-gray-800 px-4 py-4 text-3xl font-medium text-gray-900 
            dark:text-white shadow-lg">{{$post->post_title}}</p> </li>

            <li class="bg-gray-800 px-4 text-xl font-medium rounded shadow-xl ">
                <span class="hover:font-bold">
                <a href="{{ route('users.show', ['id' => $post -> user_id]) }}">
                Posted by: {{$post->user->name }} 
                </a>
                </span>
            </li>
        <div class="bg-gray-700 rounded shadow-lg">
        <div class="text-xl">
            <li class=" px-4 font-light">{{$post->post_text}} </li>
            <br/>
            <li>
                <span class="font-medium px-4 text-xl">Tags:</span>
                @if($post->tags->isEmpty())
                    N/A
                @endif
                @foreach($allTags=$post->tags as $tag)
                    {{$tag->tag_name}} 
                    @if( !$loop->last)
                    ,
                    @endif
                @endforeach
            </li>
        <br/>
            <div class="flex justify-end">
                <span class="bg-gray-800 rounded">
                <li>&nbsp;[<span class="font-medium">Created at:
                    </span> &nbsp;{{$post->created_at}}] &nbsp;</li>
                <li>&nbsp;[<span class="font-medium">Updated at: 
                    </span>{{$post->updated_at}}] &nbsp;</li>
                </span>
            </div>
            <br/>   
            @canEditPost($post)
            <li class="px-4 py-4 text-2xl max-w-xs font-medium text-gray-900 
            dark:text-white "><a href="{{ route('posts.edit', 
            ['id' => $post ->id])}}">
                <span class="bg-gray-800 rounded shadow-lg"> &nbsp;
                Edit Post
                &nbsp;
                </span>
                </a></li>
            @endcanEditPost
            @canDeletePost($post)
            <li class="px-4 text-2xl max-w-xs font-medium text-gray-900
            dark:text-white "><a href="{{ route('posts.destroy', 
            ['id' => $post ->id])}}">
                <span class="bg-gray-800 rounded shadow-lg"> &nbsp;
                Delete Post
                &nbsp;
                </span>
            </a></li>
            @endcanDeletePost
        </div>
        <br/>
        </div>
    </ul>
    <br/>
    <ul>
        @foreach($allComments=$post->comments as $comment)
            <div class="bg-gray-700 rounded shadow-lg">

            <li><a href="{{ route('users.show', ['id' => $comment -> user_id]) }}"><span class="px-4 py-4 text-2xl max-w-xs font-medium text-gray-900 
                dark:text-white ">{{$comment->user->name}}</a>:</span> 
                <span class="text-xl max-w-xs font-light text-gray-900 
                dark:text-white "> {{$comment->comment_text}} </span></li>
            @canDeleteComment($comment)
            <li class="px-4"><a href="{{ route('comments.destroy', 
            ['id' => $comment -> id])}}">
            <span class="bg-gray-800 rounded shadow-lg text-lg font-semibold"> &nbsp;
                Delete Comment
                &nbsp;
                </span>
            </a></li>
            @endcanDeleteComment
            @canEditComment($comment)
            <li class="px-4"><a href="{{ route('comments.edit', ['id' => $comment ->id,
            'id2' =>$post->id])}}">
            <span class="bg-gray-800 rounded shadow-lg text-lg font-semibold"> &nbsp;
            Edit Comment
            &nbsp;
            </span>
            </a></li>
            @endcanEditComment
            </div>
            <br/>
        @endforeach

    </ul>
    <ul>
        <li class="px-4"><a href="{{ route('comments.create', ['id' => $post ->id]) }}">
            <span class="bg-gray-800 rounded shadow-lg text-lg font-semibold"> &nbsp;
                Add Comment
                &nbsp;
                </span>
            </a></li>
        <li class="px-4"><a href="{{route('posts.index')}}">
            <span class="bg-gray-800 rounded shadow-lg text-lg font-semibold"> &nbsp;
                Back to All Posts
                &nbsp;
                </span>
        </a></li>
    </ul>
</div>



@endsection

