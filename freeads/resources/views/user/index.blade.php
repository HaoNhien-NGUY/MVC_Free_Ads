@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mb-5">
        <div class="col-4">
            <h3>Email : {{ $user->email }}</h3>
            <h3>Name : {{ $user->name }}</h3>
            <form method="POST" action="/user/{{ Auth::user()->id }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Account</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <a href="/user/{{ $user->id }}/edit">Edit profile</a>
        </div>
        <div class="col-4">
            <a href="/annonce/create">Create annonce</a>
        </div>
        <div class="col-4">
            <a href="/user/{{ $user->id }}/annonces">My annonces</a>
        </div>
    </div>
</div>

@endsection