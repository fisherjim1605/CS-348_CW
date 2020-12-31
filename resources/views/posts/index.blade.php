@extends('layouts.app')

@section('title', 'Not a Facebook Rip-off')

@section('content')
    <p>Posts Feed</p>
    <ul>
        @foreach ($posts as $post)
            <li><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></li>
        @endforeach
    </ul>
    <p><a href="{{ route('posts.create') }}">Create New Post</a></p>
    <p><a href="{{ route('layouts.home') }}">Back</a></p>
@endsection