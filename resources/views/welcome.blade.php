@extends('app')
@section('title')
Homepage
@endsection

@section('content')


{{-- @php
    $a = 'The website where u can find ur favourite ones.';
    $b = Str::slug($a);
    echo $b;
@endphp --}}
@auth
    
@if (auth()->user()->isAdmin == 1)

<a href="{{route('carousel.index')}}">Select movies for carousel</a>
@endif
@endauth

@include('added_components.carousel')
@include('added_components.card')






@endsection