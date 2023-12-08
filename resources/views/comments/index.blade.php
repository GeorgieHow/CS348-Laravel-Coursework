@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <p style = "color:#ffffff;">
        Comments
    </p>
    <ul style = "color:#ffffff;">
        @foreach($comments as $comment)
            <li>
                Comment ID: {{$comment ->id}}: 
                Comment Text: {{$comment ->comment_text}}
                User ID:{{$comment ->user_id}}
                Post ID: {{$comment ->post_id}}
            </li>
            <br/>
        @endforeach
    </ul>

    <!-- Creates the pagination at the bottom of the page -->
    {{ $comments->links() }}
@endsection