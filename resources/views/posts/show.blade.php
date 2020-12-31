@extends('layouts.app')

@section('title', 'Not a Facebook Rip-off')

@section('content')
    <p>Posts Info</p>
    <ul>
        <li>Post ID: {{ $post->id }}</li>
        <li><a href="{{ route('users.show', ['id' => $post->user->id]) }}">User: {{ $post->user->name }}</a></li>
        <li>Title: {{ $post->title }} </li>
        <li>Content: {{ $post->info }} </li>
        <li>Upload Date: {{ $post->uploadTime }} </li>
    </ul>
    <p><a href="{{ route('posts.comments', ['id' => $post->id]) }}">View Comments</a></p>
    @auth
        <p><a href="{{ route('comments.create', ['id' => $post->id]) }}">Post Comment</a></p>
        @if(Auth::id() == $post->user->id)
            <form method="POST" action="{{ route('posts.destroy', ['id' => $post->id]) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete Post</button>
            </form>
        @endif
    @endauth
    <p><a href="{{ route('posts.index') }}">Back</a></p>
@endsection