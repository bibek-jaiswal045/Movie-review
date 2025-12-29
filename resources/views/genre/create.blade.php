@extends('app')
@section('title')
Add Genres
@endsection

@section('content')

<h1>Add Genre.</h1>

<form action="{{route('genre.store')}}" method="POST">
    @csrf


    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Genre</label>
        <input type="text" class="form-control" name="genre">
        @error('genre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <button class="btn btn-primary my-3" type="submit">Add</button>
    
    
    
</form>




@endsection