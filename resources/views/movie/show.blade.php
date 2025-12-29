@extends('app')
@section('title')
All Movies
@endsection

@section('content')

<div class="d-flex justify-content-between">
    <div class="flex-left">

        <h1>{{$movie->name}}</h1>
        <p>{{$movie->details}}</p>

    <p>Stars: {{$movie->casts}}</p>
    <p>Director: {{$movie->director}}</p>
    <p>Duration: {{$movie->duration}}</p>
    </div>

    <div class="flex-right">
        <img src="{{asset('movieimages/' . $movie->image)}}" alt="">
    </div>
</div>







@endsection