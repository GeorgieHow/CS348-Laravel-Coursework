@extends('layouts.app')

@section('title', 'Post Creation')

@section('content')

<div class="bg-gray-600 pb-8">
    <p class="bg-gray-800 px-4 py-4 text-3xl font-medium text-gray-900 
    dark:text-white shadow-lg"> Edit Post: </p>
        
    <form method="POST" action = "{{route('posts.update', 
    ['id' => $post]) }}">
        @csrf
        <ul style = "color:#ffffff;">
            <li class="pl-8 px-6 py-4 text-2xl max-w-xs font-medium ">
                <span class="text-gray-900 dark:text-white ">Post Title: 
                <input style="color:black;" class="rounded" type="text" 
                name="post_title" value="{{ $post->post_title}}"/></li>
            <li class="pl-8 px-6 text-2xl max-w-xs font-medium text-gray-900 dark:text-white ">
                <span class="rounded shadow-lg">Post Text: <input style="color:black;" class="rounded" type="text" 
                name="post_text" value="{{ $post->post_text}}"/></li>
                &nbsp;
            <div>
                &nbsp;
            <input class="bg-gray-800 rounded px-6 py-2 text-2xl max-w-xs 
            font-medium text-gray-900 dark:text-white shadow-2xl" type = "submit" value = "Submit"/>
            </div>
        </ul>
        &nbsp;
        <div class="px-2">
        <a href="{{route('posts.show', ['id' => $post])}}" 
            class="bg-gray-800 rounded px-6 py-2 text-2xl max-w-xs 
                font-medium text-gray-900 dark:text-white shadow-lg">Cancel</a>
        </div>
    </form>
</div>
@endsection
