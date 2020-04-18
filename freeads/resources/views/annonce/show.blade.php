@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Title : {{$annonce->title}}</h1>
            <h2>Description : {{$annonce->description}}</h2>
            <h5>Price : {{$annonce->price}} euros</h5>
            <img src="/storage/{{ $annonce->image }}" class="w-100">
        </div>
    </div>
</div>

@endsection