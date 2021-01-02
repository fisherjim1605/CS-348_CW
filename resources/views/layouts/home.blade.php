@extends('layouts.app')

@section('title', 'Not a Facebook Rip-off')

@section('content')
<div class="container">
        <div class="card">
            <div class="card-header">Welcome to Bookface</div>
            <div class="card-body">
                @auth       
                    <p><a href="{{ route('posts.index')}}">Posts</a></p>
                    <p><a href="{{ route('users.index')}}">Users</a></p>
                @endauth

                @guest
                    <p>Login or register using the options at the top</p>
                @endguest
            </div>
        </div>
    </div>
@endsection