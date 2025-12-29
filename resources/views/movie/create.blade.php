@extends('app')
@section('title')
    Add a Movie
@endsection

@section('content')
    <h1>Add a movie</h1>


    <form method="POST" action="{{ route('movie.store') }}" enctype="multipart/form-data" class="mb-4">
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Movie: Name</label>
            <input type="text" class="form-control" name="name">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Movie: Image</label>
            <input type="file" class="form-control" name="image">
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Movie: Banner Image</label>
            <input type="file" class="form-control" name="carousel_image">
            @error('carousel_image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="id_label_multiple">
                Movie:Status
                <select class="form-select" aria-label="Default select example" name="status">
                    @foreach ($statuses as $status)
                        
                    <option value="{{$status->status}}">{{$status->status}}</option>
                    @endforeach
                </select>
            </label>
            @error('status')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        

        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Movie: Released Date</label>
            <input type="date" class="form-control" name="released_date">
            @error('released_date')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>



        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Movie's Director Name</label>
            <input type="text" class="form-control" name="director">
            @error('director')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>



        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Movie: Duration</label>
            <input type="text" class="form-control" name="duration">
            @error('duration')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>



        <div class="mb-3">
            <label for="id_label_multiple">
                Movie:Genres
            @include('added_components.genre')
            </label>
            @error('genre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="id_label_multiple">
                Movie:Casts
            @include('added_components.casts_add')
            </label>
            @error('casts')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>



        


        


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Movie: Detail</label>
            <textarea name="details" id="details" cols="30" rows="10" class="form-control"></textarea>
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

        <div class="form-check d-flex align-items-center mb-4">
            <input class="form-check-input mx-3" type="radio" name="isPublished" id="isPublished" value="0">
            <label class="form-check-label mb-0" for="isPublished">
                Don't Publish
            </label>

        </div>






        <button type="submit" class="btn btn-primary">Add</button>
        <a href="{{ route('admindashboard') }}" class="btn btn-danger">Cancel</a>
        <button type="reset" class="btn btn-secondary">Reset</button>

    </form>
@endsection
