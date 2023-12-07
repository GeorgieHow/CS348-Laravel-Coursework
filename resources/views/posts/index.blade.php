@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <p style = "color:#ffffff;">
        Posts
    </p>
    <ul style = "color:#ffffff;">
        @foreach($posts as $post)
            <li>{{$post ->post_title }}: {{$post ->post_text}} [{{$post ->created_at}}]</li>
            <br></br>
        @endforeach
    </ul>
@endsection