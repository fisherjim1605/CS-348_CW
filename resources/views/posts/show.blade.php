@extends('layouts.app')

@php
    $comments = $post->comments;
    try {
        if($post->image->url != null) {
            $hasImage = true;
        }
    } catch(Exception $e) {
        $hasImage = false;
    }
@endphp

@section('title', 'Not a Facebook Rip-off')

@section('content')
    <p><b>Posts Info</b></p>
    <ul>
        <li>Post ID: {{ $post->id }}</li>
        <li><a href="{{ route('users.show', ['id' => $post->user->id]) }}">User: {{ $post->user->name }}</a></li>
        <li>Title: {{ $post->title }} </li>
        @if($hasImage == true)
            <li><img src="{{ $post->image->url }}"></li>
        @endif
        <li>Content: {{ $post->info }} </li>
        <li>Upload Date: {{ $post->uploadTime }} </li>
    </ul>
    <br>
    <p><b>Comments</b></p>
    <ul>
        @foreach ($comments as $comment)
            <li>{{ $comment->message }}</li>
        @endforeach
    </ul>
    @auth
        <p>Post New Comment</p>    
            <form method="POST" action="{{ route('comments.store') }}">
                @csrf
                <p>Post ID: {{ $post->id }} <input type="hidden" name="post_id"
                    value="{{ $post->id }}" ></p>
                <p>Message: <input type="text" name="message"
                    value="{{ old('message') }}"></p>
                <input type="submit" value="Post Comment">
            </form> 
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