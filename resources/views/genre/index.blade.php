@extends('app')
@section('title')
Genres
@endsection

@section('content')
<div class="d-flex justify-content-between mb-4">

    <h1>All Genres</h1>
    
    <a href="{{route('genre.create')}}" class="btn btn-primary">Add Genre</a>
    
</div>
@foreach ($genres as $genre)
<ul class="d-flex justify-content-between py-1">
        
    <li>
        {{$genre->genre}}


    </li>

    <form action="{{route('genre.destroy',$genre->id)}}" method="POST">
    
        @csrf
        @method('DELETE')

        <button class="btn btn-danger">Delete</button>
        
        
    
    </form>
</ul>
    @endforeach



@endsection