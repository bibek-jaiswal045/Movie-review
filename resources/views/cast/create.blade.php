@extends('app')
@section('title')
Add Casts
@endsection

@section('content')

<h1>Add Cast.</h1>

<form action="{{route('cast.store')}}" method="POST">
    @csrf


    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Cast</label>
        <input type="text" class="form-control" name="name">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <button class="btn btn-primary my-3" type="submit">Add</button>
    
    
    
</form>




@endsection