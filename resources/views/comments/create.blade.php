@extends('layouts.app')

@section('title', 'Comment Creation')

@section('content')

    <form method="POST" action = "{{route('comments.store')}}">
        @csrf
        <ul style = "color:#ffffff;">
            <li>Comment Text: <input style="color:black;" type="text" 
                name="comment_text" value="{{ old('comment_text')}}"/></li>
            <input type = "submit" value = "Submit"/>

        </ul>
        <a href="{{url()->previous()}}" style="color:white;">Cancel</a>
    </form>

@endsection
