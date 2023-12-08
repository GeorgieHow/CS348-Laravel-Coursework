@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
    <ul style = "color:#ffffff;">
        <li>Post Title: {{$post->post_title}} </li>
        <a href="{{ route('users.show', ['id' => $post -> user_id]) }}">
            <li>Posted by: {{$post->user->name }} </li>
        </a>
        <li>Content: {{$post->post_text}} </li>
        <li>[Created at {{$post->created_at}}] </li>
        <br/>
    </ul>
    <ul>
        @foreach($allComments=$post->comments as $comment)
            <li>{{$comment->user->name}}: {{$comment->comment_text}}</li>
            <br/>
        @endforeach

    </ul>
    <ul>
        <li><a href="{{ route('comments.create', ['id' => $post -> id]) }}" 
            style="color:white;">
            Comment</a></li>
        <li><a href="{{route('posts.index')}}" style="color:white;">
            Cancel</a></li>
    </ul>



@endsection

