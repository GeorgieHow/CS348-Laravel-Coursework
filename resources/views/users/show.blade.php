@extends('layouts.app')

@section('title', 'User Details')

@section('content')
    <p style = "color:#ffffff;">
        {{$user->name}}
    </p>
@endsection