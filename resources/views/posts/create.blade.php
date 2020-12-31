@extends('layouts.app')

@section('title', 'Not a Facebook Rip-off')

@section('content')
    <p>Create New Post</p>
    
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <p>Title: <input type="text" name="title"
            value="{{ old('title') }}"></p>
        <p>Content: <input type="text" name="content"
            value="{{ old('content') }}"></p>
        <input type="submit" value="Create Post">
        <a href="{{ route('posts.index') }}">Cancel</a>
    </form>        
@endsection