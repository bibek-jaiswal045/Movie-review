@extends('app')
@section('title')
    Carousel
@endsection
@section('css')

<style>
    .select2-container--default .select2-results__option--disabled{
        color: #ffffff !important;
        background-color: gray !important;
    }
</style>

@endsection
@section('content')

    <form action="{{ route('carousel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <select class="js-example-basic-multiple form-control" name="movie_id[]" multiple="multiple" style="height: 60px">

            @foreach ($all as $movie)
                <option value="{{ $movie->id }}" class="my-2"
                    @foreach ($carousels as $carousel)
                        {{$movie->name == $carousel->movie->name ? 'disabled' : '' }} @endforeach>
                    {{ $movie->name }}</option>
            @endforeach

            {{-- @foreach ($casts as $cast)
                        <option value="{{ $cast->name }}"
                            @foreach ($all_casts as $cast_name)
            
                        {{ $cast->name == $cast_name ? 'selected' : '' }} @endforeach>
                            {{ $cast->name }}</option>
                    @endforeach --}}






        </select>
    @section('scripts')
        <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            })
        </script>
    @endsection


    {{-- <select name="movie_id" id="">
                @foreach ($all as $movie)
                    
                <option value="{{$movie->id}}">{{$movie->name}}</option>
                @endforeach
            </select> --}}

    <button type="submit" class="btn btn-primary">Select</button>

</form>


@endsection
