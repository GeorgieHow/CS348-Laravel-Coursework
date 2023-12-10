@extends('layouts.app')

@section('title', 'Comment Creation')

@section('content')

    <form wire:submit.prevent="update" method="POST" action = "{{route('comments.update',
    ['id' => $post]) }}">
        @csrf
        <ul style = "color:#ffffff;">
            <li>Comment Text: <input style="color:black;" type="text" 
                name="comment_text" value="{{$comment -> comment_text}}"/></li>

                @if (session() ->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif  

            <input type = "submit" value = "Submit"/>
            
              
        </ul>
        <a href="{{route('posts.show', ['id' => $post])}}"
        style="color:white;">Cancel</a>
    </form>

@endsection
