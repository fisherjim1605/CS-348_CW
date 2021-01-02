@extends('layouts.app')

@php
    $posts = $user->posts;
    $comments = $user->comments;
@endphp

@section('title', 'Not a Facebook Rip-off')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ $user->name }}</div>
            <div class="card-body">
                <p><b>User ID:</b> {{ $user->id }}</p>
                <p><b>Email:</b> {{ $user->email }} </p>
            </div>
            
        </div>
        <div class="card">
            <div class="card-header">Posts by {{ $user->name }}</div>
            <div class="card-body">
                @foreach($posts as $post)
                    <p><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title}}</a></p>
                @endforeach
            </div>
        </div>
        <div class="card">
            <div class="card-header">Comments by {{ $user->name }}</div>
                <div class="card-body">
                    @forelse($comments as $comment)
                        <div class="card">
                            <div class="card-header"><a href="{{ route('posts.show', ['id' => $comment->post->id]) }}">Commented on {{ $comment->post->id }}</a></div>
                                <div class="card-body">
                                    <p>{{ $comment->title}}</p>
                                    <p><i>Commented at {{$comment->uploadTime}}</i></p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No comments posted</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection