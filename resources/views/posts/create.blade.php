@extends('layouts.app')

@section('title', 'Not a Facebook Rip-off')

@section('content')
    @if($errors->any())        
            <div class="container">
                <div class="card">     
                    <div class="card-header">System Message</div>
                    <div class="card-body"> 
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            <br>
    @endif
    <div class="container">
        <div class="card">        
            <div class="card-header">Create New Post</div>
                <div class="card-body">    
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf
                        <p>Title: <input type="text" name="title"
                            value="{{ old('title') }}"></p>
                        <p>Image URL (Optional): <input type="text" name="image_url"
                            value="{{ old('image_url') }}"></p>
                        <p>Content: <input type="text" name="content"
                            value="{{ old('content') }}"></p>
                        <input type="submit" value="Create Post">
                        <a href="{{ route('posts.index') }}">Cancel</a>
                    </form>        
                </div>      
            </div>      
        </div>      
    </div>
@endsection