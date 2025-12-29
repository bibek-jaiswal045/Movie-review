@extends('app')
@section('title')
    Admin Dashboard
@endsection

@section('content')
    {{-- <div class="d-flex justify-content-between my-4 border-bottom p-4 align-items-center">

        <h1>Hello {{auth()->user()->name}}!</h1>

        <form action="{{ route('logout') }}" method="POST" class="my-4">
            @csrf
            <button class="btn btn-primary" type="submit">Log Out</button>
        </form>


        <a href="{{ route('homepage') }}" class="btn btn-primary">Homepage</a>
        <a href="{{ route('movie.index') }}" class="btn btn-primary">All Movies</a>
        <a href="{{ route('movie.create') }}" class="btn btn-primary mx-3">Add a movie</a>
    </div> --}}
    {{-- @foreach ($movies as $movie)
        <div class="d-flex justify-content-between my-4 border-bottom p-4">

            <div class="flex-left">
                <h3 class="text-primary">
                    <a href="{{ route('showmovie', $movie->id) }}" style="text-decoration: none;">

                        {{ $movie->name }}
                    </a>
                </h3>
                <p>{{ $movie->details }}</p>

                <p>Stars: {{ $movie->casts }}</p>
                <p>Director: {{ $movie->director }}</p>
                <p>Duration: {{ $movie->duration }}</p>
                <p>
                <div class="ratingscount mt-3">
                    <p>

                        @php
                            
                            $avg_rating = $movie->ratings->avg('ratings');
                        @endphp
                        Rating:

                        @if ($avg_rating == 0)
                            <span>No reviews till now.</span>
                        @else
                            <span>
                                @for ($stars = 1; $stars <= $avg_rating; $stars++)
                                    <i class="fa-solid fa-star" style="color: #edc707;"></i>
                                @endfor

                            </span>
                        @endif
                    </p>
                </div>

                </p>


                <div class="d-flex">

                    <a href="{{ route('movie.edit', $movie->id) }}" class="btn btn-secondary ">Edit</a>

                    <button type="button" class="btn btn-danger mx-3" data-bs-toggle="modal"
                        data-bs-target="#myModal-{{ $movie->id }}">
                        Delete
                    </button>
                    @include('added_components.modal_delete')

                </div>

            </div>

            <div class="flex-right">
                <img src="{{ asset('movieimages/' . $movie->image) }}" alt="" style="width: 250px; height:375px;" class="mx-3">

            </div>


        </div>
    @endforeach --}}

    @include('added_components.card')
    
    <div class="links">
        {{$movies->links('pagination::bootstrap-5')}}
    </div>
    
    
    
    
@endsection
