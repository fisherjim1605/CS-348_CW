@extends('layouts.app')

@section('title', 'Not a Facebook Rip-off')

@section('content')
    <p>Comments</p>
    <ul>
        @foreach ($comments as $comment)
            <li>{{ $comment->message }}</li>
        @endforeach
    </ul>
@endsection