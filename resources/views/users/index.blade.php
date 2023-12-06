@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <p style = "color:#ffffff;">
        Users
    </p>
    <ul style = "color:#ffffff;">
        @foreach($users as $user)
            <li><a href="{{ route('users.show', ['id' => $user -> id]) }}">
                {{ $user ->name }}</a></li>
        @endforeach
    </ul>
@endsection