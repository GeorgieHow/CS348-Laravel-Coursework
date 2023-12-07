@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <p style = "color:#ffffff;">
        Posts
    </p>
    <p style = "color:#ffffff;">
        <a href = "{{ route('posts.create')}}"> Create Post </a>
    </p>

    <ul style = "color:#ffffff;">
        @foreach($posts as $post)
            <li>
                <a href="{{ route('posts.show', ['id' => $post -> id]) }}">
                    {{$post ->post_title }}: 
                    {{$post ->post_text}} 
                    [{{$post ->created_at}}]
                </a>
            </li>
            <br></br>
        @endforeach
    </ul>

    <!-- Creates the pagination at the bottom of the page -->
    {{ $posts->links() }}
@endsection