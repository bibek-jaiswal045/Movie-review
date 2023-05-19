@extends('app')
@section("title")
{{$movie->name}}
@endsection

@section('content')

<h1>Edit Details of: <span class="text-primary">{{$movie->name}}</span></h1>



<form method="POST" action="{{ route('movie.update', $movie->id) }}" enctype="multipart/form-data" class="mb-4">
    @method('PUT')
    @csrf

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Movie: Name</label>
        <input type="text" class="form-control" name="name" value="{{$movie->name}}">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>


    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Movie: Image</label>
        <input type="file" class="form-control" name="image" value="{{$movie->image}}">
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>


    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Movie: Banner Image</label>
        <input type="file" class="form-control" name="carousel_image" value="{{$movie->carousel_image}}">
        @error('carousel_image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>



    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Movie's Director Name</label>
        <input type="text" class="form-control" name="director" value="{{$movie->director}}">
        @error('director')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>



    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Movie: Duration</label>
        <input type="text" class="form-control" name="duration" value="{{$movie->duration}}">
        @error('duration')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>


    <div class="mb-3">
        <label for="id_label_multiple">
            Movie:Status
            <select class="form-select" aria-label="Default select example" name="status">       
    @foreach ($statuses as $status)
    
    <option value="{{$status->status}}" 
                        {{$movie->status == $status->status ? 'selected' : ''}}
                    
                    
                    >{{$status->status}}</option>
                @endforeach
            </select>
        </label>
        @error('status')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    
    
    
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Movie: Released Date</label>
        <input type="date" class="form-control" name="released_date" value="{{$movie->released_date}}">
        @error('released_date')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="id_label_multiple">
            Movie:Casts
        @include('added_components.edit_casts')
        </label>
        @error('casts')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>



    <div class="mb-3">
        <label for="id_label_multiple">
            Movie:Genres
        @include('added_components.edit_genre')
        </label>
        @error('genre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>


    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Movie: Detail</label>
        {{-- <input type="text" class="form-control" name="details" > --}}
        <textarea name="details" id="details" cols="30" rows="10" class="form-control">{{$movie->details}}</textarea>
        @error('details')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-check d-flex align-items-center">
        <input class="form-check-input  mx-3" type="radio" name="isPublished" id="isPublished" value="1">
        <label class="form-check-label mb-0" for="isPublished">
            Publish Now
        </label>
    </div>
    @error('isPublished')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <div class="form-check d-flex align-items-center mb-4">
        <input class="form-check-input mx-3" type="radio" name="isPublished" id="isPublished" value="0">
        <label class="form-check-label mb-0" for="isPublished">
            Don't Publish
        </label>

    </div>
    
    
    

    
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{route('admindashboard')}}" class="btn btn-danger">Cancel</a>



</form>

@endsection