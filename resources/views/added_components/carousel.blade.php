<div class="my-5">
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            {{-- @foreach ($movies as $index => $movie) --}}
            @foreach ($carousels as $index => $movie)
                <button type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="true"
                    aria-label="Slide {{ ++$index }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">

            
            
            @foreach ($carousels as $index => $carousel)
            {{-- <p>{{$carousel->movie->name}}</p> --}}
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ asset('carouselimages/' . $carousel->movie->carousel_image) }}" alt=""
                        style="width: 100%; height:500px;">
                </div>
            @endforeach


        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


</div>
