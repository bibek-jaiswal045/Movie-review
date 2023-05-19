@extends('app')
@section('title')
    {{ $movie->name }}
@endsection

@section('content')
    <div class="d-flex justify-content-between">
        <div class="flex-left">
            @php
            $cast_all = explode(',', $movie->casts);
            $genre_all = explode(',', $movie->genre);
            
        @endphp
            <h1>{{ $movie->name }}</h1>
            <p>{{ $movie->details }}</p>
            <p>Genre: 
                @foreach ($genre_all as $genre)
                    @if ($loop->last)
                        
                    <span>&nbsp;{{ $genre }}</span>.
                    @else
                    <span>&nbsp;{{ $genre }}</span>,
                    
                    @endif
                @endforeach
            </p>

            <p>Casts:
                @foreach ($cast_all as $cast)
                    @if ($loop->last)
                        
                    <span>&nbsp;{{ $cast }}</span>.
                    @else
                    <span>&nbsp;{{ $cast }}</span>,
                    
                    @endif
                @endforeach
            </p>

            <p>Director: {{ $movie->director }}</p>
            <p>Duration: {{ $movie->duration }}</p>
            @php
                $current_time = Carbon\Carbon::now()->toDateTimeString();
            @endphp
            @if ($movie->released_date > $current_time)
                <p>Releasing on: {!! htmlspecialchars_decode(date(' F j, Y', strtotime($movie->released_date))) !!}</p>
            @else
                <p>Released on:{!! htmlspecialchars_decode(date(' F j, Y', strtotime($movie->released_date))) !!}</p>
            @endif
            <p>@include('added_components.advanced_rating')</p>

        </div>

        <div class="flex-right">
            <img src="{{ asset('movieimages/' . $movie->image) }}" alt="" style="width: 250px; height:375px;">
        </div>
    </div>
@endsection
