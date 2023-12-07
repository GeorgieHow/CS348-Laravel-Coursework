@extends('layouts.app')

@section('title', 'Post Creation')

@section('content')

    <form method="POST" action = "{{route('posts.store')}}">
        @csrf
        <ul style = "color:#ffffff;">
            <li>Post Title: <input style="color:black;" type="text" 
                name="post_title" value="{{ old('post_title')}}"/></li>
            <li>Post Text: <input style="color:black;" type="text" 
                name="post_text" value="{{ old('post_text')}}"/></li>
            <li>User ID: <input style="color:black;" type="text" 
                name="user_id" value="{{ old('user_id')}}"/></li>
            <input type = "submit" value = "Submit"/>

        </ul>
        <a href="{{route('posts.index')}}" style="color:white;">Cancel</a>
    </form>

@endsection
