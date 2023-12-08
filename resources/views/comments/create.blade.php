@extends('layouts.app')

@section('title', 'Post Creation')

@section('content')

    <form method="POST" action = "{{route('posts.store')}}">
        @csrf
        <ul style = "color:#ffffff;">
            <li>Comment Text: <input style="color:black;" type="text" 
                name="post_title" value="{{ old('post_title')}}"/></li>
            <input type = "submit" value = "Submit"/>

        </ul>
        <a href="{{url()->previous()}}" style="color:white;">Cancel</a>
    </form>

@endsection
