@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>All Annonces &nbsp; ({{ $annonces->count() }})</h1>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($annonces as $annonce)
        <div class="col-4 pb-4">
            <h4>{{ $annonce->title }}</h4>
            <a href="/annonce/{{ $annonce->id }}">
                <img src="/storage/{{ $annonce->image }}" class="w-100">
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection