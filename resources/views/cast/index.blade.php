@extends('app')
@section('title')
Casts
@endsection

@section('content')
<div class="d-flex justify-content-between mb-4">

    <h1>All Casts</h1>
    
    <a href="{{route('cast.create')}}" class="btn btn-primary">Add Cast</a>
    
</div>
@foreach ($casts as $cast)
<ul class="d-flex justify-content-between py-1">
        
    <li>
        {{$cast->name}}


    </li>

    <form action="{{route('cast.destroy',$cast->id)}}" method="POST">
    
        @csrf
        @method('DELETE')

        <button class="btn btn-danger">Delete</button>
        
        
    
    </form>
</ul>
    @endforeach



@endsection