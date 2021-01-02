@extends('layouts.app')

@section('title', 'Not a Facebook Rip-off')

@section('content')
    <p><b>Posts Feed</b></p>
    @foreach ($posts as $post)
            <p><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></p>
    @endforeach
    {{ $posts->links() }}
    <p><a href="{{ route('posts.create') }}">Create New Post</a></p>
    <p><a href="{{ route('layouts.home') }}">Back</a></p>
@endsection