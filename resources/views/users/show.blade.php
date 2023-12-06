@extends('layouts.app')

@section('title', 'User Details')

@section('content')
    <ul style = "color:#ffffff;">
        <li>Name: {{$user->name}} </li>
        <li>Email: {{$user->email}} </li>
    </ul>
@endsection