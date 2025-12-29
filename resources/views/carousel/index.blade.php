@extends('app')
@section('title')
    Carousel
@endsection

@section('content')
    <div class="d-flex justify-content-between mb-4">

        <h1>All Selected</h1>

        <a href="{{ route('carousel.create') }}" class="btn btn-primary">Add Movie</a>

    </div>

    @foreach ($carousels as $carousel)
        <ul class="d-flex justify-content-between py-1">

            <li>
                {{ $carousel->movie->name}}


            </li>

            <form action="{{ route('carousel.destroy', $carousel->id) }}" method="POST">

                @csrf
                @method('DELETE')

                <button class="btn btn-danger">Delete</button>



            </form>
        </ul>
    @endforeach
@endsection
