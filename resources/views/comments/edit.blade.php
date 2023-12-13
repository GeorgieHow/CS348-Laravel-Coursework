@extends('layouts.app')

@section('title', 'Edit Comment')

@section('content')

<div class="bg-gray-600 pb-8">
    <p class="bg-gray-800 px-4 py-4 text-3xl font-medium text-gray-900 
    dark:text-white shadow-lg"> Edit Comment: </p>

    <form method="POST" action = "{{route('comments.update',
    ['id' => $comment, 'id2' => $post]) }}">
        @csrf
        <ul style = "color:#ffffff;">
            <li class="pl-8 px-6 py-4 text-2xl max-w-xs font-medium ">
                <span class="text-gray-900 dark:text-white ">Comment Text: 
                <input style="color:black;" class="rounded" type="text" 
                name="comment_text" value="{{ $comment->comment_text}}"/></li>
                
                &nbsp;
                <div>
                &nbsp;
                <input class="bg-gray-800 rounded px-6 py-2 text-2xl max-w-xs 
                font-medium text-gray-900 hover:font-bold dark:text-white shadow-2xl" type = "submit" value = "Submit"/>
                </div>
            
              
        </ul>
        &nbsp;
        <div class="px-2">
            <a href="{{route('posts.show', ['id' => $post])}}" 
                class="bg-gray-800 rounded px-6 py-2 text-2xl max-w-xs 
                    font-medium text-gray-900 hover:font-bold    dark:text-white shadow-lg">Cancel</a>
            </div>
    </form>
</div>
@endsection
