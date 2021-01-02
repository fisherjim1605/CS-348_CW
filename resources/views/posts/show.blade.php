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
    <div class="container">
        <div class="card">
            <div class="card-header">{{$post->title}}</div>
            <div class="card-body">
                <p><b><a href="{{ route('users.show', ['id' => $post->user->id]) }}">Posted by {{ $post->user->name }}</a></b></p>
                @if($hasImage == true)
                    <p><img src="{{ $post->image->url }}"></p>
                @endif
                <p>{{ $post->info }}</p>
                <p><i>Uploaded at {{ $post->uploadTime }}</i></p>
            </div>
            <div class="container">
                @auth
                    @if(Auth::id() == $post->user->id)
                        <form method="POST" action="{{ route('posts.destroy', ['id' => $post->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete Post</button>
                        </form>
                    @endif
                @endauth
                <br>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="card">
            <div class="card-header">Comments on <b>{{$post->title}}</b></div>
            <div class="card-body">
                @foreach ($comments as $comment)                
                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('users.show', ['id' => $post->user->id]) }}">Commented by {{$comment->user->name}}</a>
                            </div>
                            <div class="card-body">
                                <p>{{ $comment->message }}</p>
                                <p><i>Commented at {{ $comment->uploadTime}}</i></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>      
            <div class="container">      
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
                @endauth
                <br>
            </div>
        </div>
    </div>
@endsection