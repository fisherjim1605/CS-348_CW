@extends('layouts.app')

@php
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
                        <p><img src="{{ $post->image->url }}" style="max-width:100%; max-height:100%"></p>
                    @endif
                    <p>{{ $post->info }}</p>
                    <p><i>Uploaded at {{ $post->uploadTime }}</i></p>
                    
                    <form method="POST" action="{{ route('posts.update', ['id' => $post->id]) }}">
                        @csrf   
                        @method('PUT')             
                        <p>New Title: <input type="text" name="title"
                            value="{{ old('title') }}"></p>
                        <p>New Content: <input type="text" name="content"
                            value="{{ old('content') }}"></p>                        
                        <p>New Image URL (Optional): <input type="text" name="image_url"
                            value="{{ old('image_url') }}"></p>  
                        <input type="submit" value="Update Post">                       
                    </form>          
                </div>
            <div class="container">                
                <p><a href="{{ route('posts.show', ['id' => $post->id]) }}">Back</a></p>
            </div>
        </div>
    </div>
@endsection