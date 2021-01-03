@extends('layouts.app')

@section('title', 'Not a Facebook Rip-off')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Users List</div>
            <div class="card-body">
                @foreach ($users as $user)
                    <p><a href="{{ route('users.show', ['id' => $user->id]) }}">{{ $user->name }}</a></p>
                @endforeach
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection