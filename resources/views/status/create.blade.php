@extends('app')
@section('title')
Add Status
@endsection

@section('content')

<h1>Add Status.</h1>

<form action="{{route('status.store')}}" method="POST">
    @csrf


    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Status</label>
        <input type="text" class="form-control" name="status">
        @error('status')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <button class="btn btn-primary my-3" type="submit">Add</button>
    
    
    
</form>




@endsection