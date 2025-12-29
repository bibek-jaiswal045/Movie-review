@extends('app')
@section('title')
    All Movies
@endsection

@section('content')

<div class="search">
    @include('added_components.search')
</div>

<a href="{{route('calendar')}}" class="btn btn-success ">Movies Calendar</a>
@include('added_components.card')


    <div class="links">
        {{$movies->links('pagination::bootstrap-5')}}
    </div>

    
@endsection
