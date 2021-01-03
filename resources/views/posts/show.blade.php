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
            <div class="card-header">{{$post->title}}</div>
            <div class="card-body">
                <p><b><a href="{{ route('users.show', ['id' => $post->user->id]) }}">Posted by {{ $post->user->name }}</a></b></p>
                @if($hasImage == true)
                    <p><img src="{{ $post->image->url }}" style="max-width:100%; max-height:100%"></p>
                @endif
                <p>{{ $post->info }}</p>
                <p><i>Uploaded at {{ $post->uploadTime }}</i></p>
            </div>
            <div class="container">
                @auth
                    @if(Auth::id() == $post->user->id)
                        <p><b><a href="{{ route('posts.edit', ['id' => $post->id]) }}">Edit Post</a></b></p>
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
                <div class="container">      
                    @auth
                    <div class="card">
                        <div class="card-body">
                            <p>Post New Comment</p>    
                                <form method="POST" action="{{ route('comments.store') }}">
                                    @csrf
                                    <p><input type="hidden" name="post_id" value="{{ $post->id }}" ></p>
                                    <p>Message: <input type="text" name="message"
                                        value="{{ old('message') }}"></p>
                                    <p>Image URL (Optional): <input type="text" name="image_url"
                                        value="{{ old('image_url') }}"></p>
                                    <input type="submit" value="Post Comment">
                                </form> 
                            </div>
                        </div>
                    @endauth
                </div>
                <br>
                @forelse($comments as $comment)
                    @php
                        try {
                            if($comment->image->url != null) {
                                $commentHasImage = true;
                            }
                        } catch(Exception $e) {
                            $commentHasImage = false;
                        }
                    @endphp                
                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('users.show', ['id' => $comment->user->id]) }}">Commented by {{$comment->user->name}}</a>
                            </div>
                            <div class="card-body">
                                <p>{{ $comment->message }}</p>
                                @if($commentHasImage == true)
                                    <p><img src="{{ $comment->image->url }}" style="max-width:100%; max-height:100%"></p>
                                @endif
                                <p><i>Commented at {{ $comment->uploadTime}}</i></p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No comments found</p>
                @endforelse
            </div>                  
        </div>
        <p><a href="{{ route('posts.index') }}">Back</a></p>
    </div>
@endsection