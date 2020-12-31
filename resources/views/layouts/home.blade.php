@extends('layouts.app')

@section('title', 'Not a Facebook Rip-off')

@section('content')
    @auth
        <p>Home Page</p>
        <ul>        
            <li><a href="{{ route('posts.index')}}">Posts</a></li>
            <li><a href="{{ route('users.index')}}">Users</a></li>
        </ul>
    @endauth

    @guest
        <p>Login or register using the options at the top</p>
    @endguest
@endsection