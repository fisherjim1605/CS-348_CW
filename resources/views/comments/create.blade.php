@extends('layouts.app')

@section('title', 'Not a Facebook Rip-off')

@section('content')
    <p>Post New Comment</p>
    
    <form method="POST" action="{{ route('comments.store') }}">
        @csrf
        <p>Post ID: {{ $id }} <input type="text" name="post_id"
            value="{{ $id }}"
            <?php echo 'readonly="readonly"'; ?>
            ></p>
        <p>Message: <input type="text" name="message"
            value="{{ old('message') }}"></p>
        <input type="submit" value="Post Comment">
        <a href="{{ route('posts.index') }}">Cancel</a>
    </form>        
@endsection