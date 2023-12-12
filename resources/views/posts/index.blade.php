@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div class="bg-gray-600">
        <p class="bg-gray-800 px-6 py-4 text-3xl font-medium text-gray-900 dark:text-white shadow-lg">
            &nbsp; All Posts
        </p>
        <div class="pl-8 px-6 py-4 text-2xl max-w-xs font-medium text-gray-900 dark:text-white ">
            <span class="bg-gray-800 rounded shadow-lg">
            <a href = "{{ route('posts.create')}}"> &nbsp; Create Post &nbsp; </a>
            </span>
        </div>
        <div class="max-w-full px-6 py-4 rounded">
            <ul>

                    @foreach($posts as $post)
                        <div class="bg-gray-700 max-w-4xl px-6 py-4 rounded shadow-lg">
                        <li>
                            <a href="{{ route('posts.show', ['id' => $post -> id]) }}">
                                <ul>
                                <li><p class="text-xl text-gray-900 dark:text-white bg-gray-800 rounded">
                                    {{$post ->post_title}}</p>
                                </li>
                                <li>{{$post ->post_text}}</li>
                                <li>
                                    <p class="text-right">
                                    <span class="bg-gray-800 rounded shadow-lg">
                                    [Created by {{$post->user->name}} at <span class="italic"> {{$post ->created_at}}</span>]
                                    </span>
                                    </p>
                            </li>
                                </ul>
                            </a>
                        </li>
                    </div>
                    <br/>
                    @endforeach

                <br/>
            </ul>
        </div>
    </div>
    <!-- Creates the pagination at the bottom of the page -->
    <div class="flex justify-end">
    {{ $posts->links() }}
    </div>
@endsection