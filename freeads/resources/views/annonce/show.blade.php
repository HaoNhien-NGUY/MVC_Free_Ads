@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>Title : {{$annonce->title}}</h1>
            <h2>Description : {{$annonce->description}}</h2>
            <h5>Price : {{$annonce->price}} euros</h5>
            <h5>Annonce de : {{$annonce->user->name}}</h5>
        </div>

        @foreach($annonce->images as $image)
        <div class="col-4 pb-4">
            <img src="/storage/{{ $image->image }}" class="w-100 border border-secondary">
        </div>
        @endforeach

    </div>
    @if(isset(Auth::user()->id) && Auth::user()->id == $annonce->user_id)
    <div class="row flex-column mt-5">
        <div class="col-3">

            <form method="POST" action="/annonce/{{ $annonce->id }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete annonce</button>
            </form>
        </div>
        <div class="col-3">
            <a href="/annonce/{{$annonce->id}}/edit">Edit annonce</a>
        </div>
    </div>
    @endif
</div>

@endsection