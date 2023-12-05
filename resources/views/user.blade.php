@extends('layouts.app')

@section('title', 'Users')

@section('content')
    @if($user)
        <p style="color:#ffffff;">
            Hello, you just got to the profile page for {{ $user }}!
        </p>
    @else
        <p style="color:#ffffff;">
            No user page found.
        <p>
    @endif
@endsection