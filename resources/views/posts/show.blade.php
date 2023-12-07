@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
    <ul style = "color:#ffffff;">
        <li>Post Title: {{$post->post_title}} </li>
        <li>Posted by: {{$post->user->name }} </li>
        <li>Content: {{$post->post_text}} </li>
        <li>[Created at {{$post ->created_at}}] </li>
        <li><a href="{{route('comments.create')}}" style="color:white;">
            Comment</a></li>
        <li><a href="{{route('posts.index')}}" style="color:white;">
            Cancel</a></li>
    </ul>



@endsection

