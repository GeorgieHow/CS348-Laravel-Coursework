@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <p style = "color:#ffffff;">
        Users
    </p>
    <ul style = "color:#ffffff;">
        @foreach($users as $user)
            <li>{{ $user ->name }}</li>
        @endforeach
    </ul>
@endsection