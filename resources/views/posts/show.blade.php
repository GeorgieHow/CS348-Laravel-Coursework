@extends('layouts.app')

@section('title', 'Post Details')

@section('content')
    @vite('resources/css/app.css')
    <ul style = "color:#ffffff;">
        <li><p>Post Title: {{$post->post_title}}</p> </li>
        <a href="{{ route('users.show', ['id' => $post -> user_id]) }}">
            <li>Posted by: {{$post->user->name }} </li>
        </a>
        <li>Content: {{$post->post_text}} </li>
        <li>
            Tags:
            @if($post->tags->isEmpty())
                N/A
            @endif
            @foreach($allTags=$post->tags as $tag)
                {{$tag->tag_name}} 
                @if( !$loop->last)
                ,
                @endif
            @endforeach
        </li>
        <li>[Created at: &nbsp;{{$post->created_at}}] </li>
        <li>[Updated at: {{$post->updated_at}}]</li>
        <br/>   
        <li><a href="{{ route('posts.edit', ['id' => $post ->id])}}" 
            style="color:white;">
            Edit Post</a></li>
        <li><a href="{{ route('posts.destroy', ['id' => $post ->id])}}"
            style="color:white;">
            Delete Post</a></li>
        <br/>
    </ul>
    <ul>
        @foreach($allComments=$post->comments as $comment)
            <li>{{$comment->user->name}}: {{$comment->comment_text}}</li>
            <li><a href="{{ route('comments.destroy', ['id' => $comment -> id])}}"
            style="color:white;">
            Delete Comment</a></li>
            <li><a href="{{ route('comments.edit', ['id' => $comment ->id,
            'id2' =>$post->id])}}" 
            style="color:white;">
            Edit Comment</a></li>
            <br/>
        @endforeach

    </ul>
    <ul>
        <li><a href="{{ route('comments.create', ['id' => $post ->id]) }}" 
            style="color:white;">
            Comment</a></li>
        <li><a href="{{route('posts.index')}}" style="color:white;">
            Cancel</a></li>
    </ul>



@endsection

