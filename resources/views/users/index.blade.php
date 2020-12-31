@extends('layouts.app')

@section('title', 'Not a Facebook Rip-off')

@section('content')
    <p>Users List</p>
    <ul>
        @foreach ($users as $user)
            <li><a href="{{ route('users.show', ['id' => $user->id]) }}">{{ $user->name }}</a></li>
        @endforeach
    </ul>
@endsection