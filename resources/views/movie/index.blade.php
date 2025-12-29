@extends('app')
@section('title')
All Movies List
@endsection

@section('content')

<h1 class="my-5">All Movies List</h1>

@foreach ($movies as $movie)
    
<div class="d-flex justify-content-between my-4 border-bottom p-4">

<div class="flex-left">
    <h3 >
        <a href="{{route('showmovie', $movie->id)}}" style="text-decoration: none;">
        {{$movie->name}}
    </a>
    </h3>
    <p>{{$movie->details}}</p>

    <p>Stars: {{$movie->casts}}</p>
    <p>Director: {{$movie->director}}</p>
    <p>Duration: {{$movie->duration}}</p>
    <div class="ratingscount mt-3">
        <p>

            @php
                
                $avg_rating = $movie->ratings->avg('ratings');
                // $j = number_format($avg_rating);
            @endphp
            Rating:

            @if ($avg_rating == 0)
                <span>No reviews till now.</span>
            @else
                {{-- <span>{{ $j = number_format($avg_rating, 3) }}</span> --}}
                <span>
                    @for ($stars = 1; $stars <= $avg_rating; $stars++)
                        <i class="fa-solid fa-star" style="color: #edc707;"></i>
                    @endfor

                </span>
            @endif
        </p>
    </div>
    
</div>

<div class="flex-right">
    <img src="{{asset('movieimages/' . $movie->image)}}" alt="" style="width: 250px; height:375px;">

</div>

        
</div>
    
@endforeach
<div class="links">
    {{$movies->links('pagination::bootstrap-5')}}
</div>
@endsection