@extends('layouts.app')

@section('title', 'Not a Facebook Rip-off')

@section('content')
    <p>Comments from Post {{ $comments->first()->post_id }}</p>
    <ul>
        @foreach ($comments as $comment)
            <li>{{ $comment->message }}</li>
        @endforeach
    </ul>
    <p><a href="{{ route('posts.show', ['id' => $comments->first()->post_id]) }}">Back to Post</a></p>
@endsection