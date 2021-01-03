@extends('layouts.app')

@section('title', 'Not a Facebook Rip-off')

@section('content')
    @if(session('message'))
        <div class="container">
            <div class="card">     
                <div class="card-header">System Message</div>
                <div class="card-body"> 
                    <p>{{ session('message') }}</p>
                </div>
            </div>
        </div>
        <br>
    @endif

    <div class="container">
        <div class="card">
            <div class="card-header">Posts Feed</div>
            <div class="card-body">
            @foreach ($posts as $post)
                    <p><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></p>
            @endforeach
            {{ $posts->links() }}
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <p><a href="{{ route('posts.create') }}">Create New Post</a></p>
                <p><a href="{{ route('layouts.home') }}">Back</a></p>
            </div>
        </div>
    </div>
@endsection