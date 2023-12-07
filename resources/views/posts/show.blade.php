@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
    <ul style = "color:#ffffff;">
        <li>Post Title: {{$post->post_title}} </li>
        <li>Posted by: {{$post->user_id}} </li>
        <li>Content: {{$post->post_text}} </li>
        <li>[Created at {{$post ->created_at}}] </li>
    </ul>

@endsection

