@extends('layouts.app')

@section('title', 'User Details')

@section('content')
    <ul style = "color:#ffffff;">
        <li>Name: {{$user->name}} </li>
        <li>Email: {{$user->email}} </li>
        <li>Bio: {{$user->profile->profile_bio}}</li>
    </ul>

    <ul>
    <br/>
        <li>User's Posts</li>
        @foreach($user->posts as $post)
            <li>
                <a href="{{ route('posts.show', ['id' => $post -> id]) }}">
                    {{$post ->post_title }}: 
                    {{$post ->post_text}} 
                    [{{$post ->created_at}}]
                </a>
            </li>
            <br/>
        @endforeach
    </ul>

    <ul>
    <br/>
        <li>User's Comments<li>
            @foreach($user->comments as $comment)
            <li>
                <a href="{{ route('comments.show', ['id' => $comment->id,
                'id2' => $comment->post->id]) }}">
                Comment Text: {{$comment ->comment_text}}<br/>
                Commented on: {{$comment->post->post_title}} 
                [Post ID: {{$comment ->post_id}}]
                </a>
            </li>
            <br/>
        @endforeach
    </ul>

@endsection