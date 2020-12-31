@extends('layouts.app')

@section('title', 'Not a Facebook Rip-off')

@section('content')
    <p>Users List</p>
    <ul>
        <li>User ID: {{ $user->id }}</li>
        <li>Name: {{ $user->name }} </li>
        <li>Email: {{ $user->email }} </li>
    </ul>
@endsection