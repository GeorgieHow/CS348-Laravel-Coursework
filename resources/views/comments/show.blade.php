@extends('layouts.app')

@section('title', 'Comment Details')

@section('content')
    <ul style = "color:#ffffff;">
        <li>Posted by: {{$comment->user->name }} </li>
        <li>Content: {{$comment->comment_text}} </li>
        <li>[Created at {{$comment->created_at}}] </li>
        <br/>
    </ul>
@endsection

