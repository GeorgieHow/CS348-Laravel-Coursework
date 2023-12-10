@extends('layouts.app')

@section('title', 'Post Creation')

@section('content')

    
    <form method="POST" action = "{{route('posts.update', 
    ['id' => $post]) }}">
        @csrf
        <ul style = "color:#ffffff;">
            <li>Post Title: <input style="color:black;" type="text" 
                name="post_title" value="{{$post->post_title}}"/></li>
            <li>Post Text: <input style="color:black;" type="text" 
                name="post_text" value="{{$post->post_text}}"/></li>
            <input type = "submit" value = "Submit"/>

        </ul>
        <a href="{{route('posts.show', ['id' => $post])}}" 
            style="color:white;">Cancel</a>
    </form>

@endsection
