@extends('layouts.app')

@section('title', 'User Details')

@section('content')
<div class="bg-gray-600">
    <p class="bg-gray-800 px-4 py-4 text-3xl font-medium text-gray-900 
    dark:text-white shadow-lg"> User </p>
    <ul class="bg-gray-600 rounded shadow-lg px-4">
        <li class="text-xl font-medium text-gray-900 
        dark:text-white ">Name: {{$user->name}} </li>
        <li class="text-xl font-medium text-gray-900 
        dark:text-white ">Email: {{$user->email}} </li>
        <li class="text-xl font-medium text-gray-900 
        dark:text-white ">Bio/Information: {{$user->profile->profile_bio}}</li>
    </ul>

    <ul>
        <li class="bg-gray-800 px-4 py-4 text-2xl font-medium text-gray-900 
        dark:text-white shadow-lg">User's Posts</li>
        @foreach($user->posts as $post)
            <li>
                <div class="bg-gray-700 hover:bg-blue-900 rounded shadow-lg">
                <a href="{{ route('posts.show', ['id' => $post -> id]) }}">
                    <span class="px-4 py-4 text-2xl font-medium text-gray-900 
                    dark:text-white">{{$post ->post_title }}</span>
                    <p class="px-4 text-xl font-normal text-gray-900 
                    dark:text-white shadow-lg">
                    {{$post ->post_text}} 
                        @if($post->image_path)
                        <img src="{{ asset('storage/' .$post->image_path) }}" alt="Post Image">
                        @endif
                    
                    [{{$post ->created_at}}]
                    </p>
                </a>
            </div>
            </li>
            <br/>
        @endforeach
    </ul>

    <ul>
    <li class="bg-gray-800 px-4 py-4 text-2xl font-medium text-gray-900 
    dark:text-white shadow-lg">User's Comments</li>
            @foreach($user->comments as $comment)
            <li>
                <div class="bg-gray-700 hover:bg-blue-900 rounded shadow-lg">
                <a href="{{ route('posts.show', ['id' => $comment->post_id]) }}">
                    <p class="px-4 py-4 text-xl font-normal text-gray-900 
                    dark:text-white">{{$comment ->comment_text}}<br/>
                Commented on: {{$comment->post->post_title}} at [{{$comment->created_at}}]</p>
                </a>
            </div>
            </li>
        </br>
        @endforeach
    </ul>
    <p class="px-4"><a href="{{route('posts.index')}}">
        <span class="bg-gray-800 rounded hover:font-bold shadow-lg text-lg font-semibold"> &nbsp;
            Back to All Posts
            &nbsp;
            </span>
    </a></p>
</div>
@endsection