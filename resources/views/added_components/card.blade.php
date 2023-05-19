<div id="features-wrapper">

    <div class="container">

        <div class="row">
            @php
                $current_time = Carbon\Carbon::now()->toDateTimeString();
                @endphp
            @foreach ($movies as $movie)
            {{-- @php
                $image = str_replace('public/', '', $movie->image);
            @endphp --}}
                <div class="col-4 col-12-medium">

                    <!-- Box -->
                    <section class="box feature" id="card_whole">
                        <a href="{{ route('showmovie', $movie->id) }}" class="image featured"><img
                                {{-- src="{{ asset($image) }}" alt="" --}}
                                src="{{ asset('movieimages/' . $movie->image) }}" alt=""
                                style="max-width: 100%; height:300px;" /></a>
                        <a href="{{ route('showmovie', $movie->id) }}" style="text-decoration: none; color:#696969">
                            <div class="inner">
                                <header>
                                    <h2>
                                        {{ Str::limit($movie->name, 20) }}
                                    </h2>
                                    <p>Genres: {{ Str::limit($movie->genre, 25) }}</p>
                                    <p>Casts: {{ Str::limit($movie->casts, 25) }}</p>

                                    @if ($movie->released_date > $current_time)
                                        <p>Releasing on: {!! htmlspecialchars_decode(date(' F j, Y', strtotime($movie->released_date))) !!}</p>
                                    @else
                                        <p>Released on:{!! htmlspecialchars_decode(date(' F j, Y', strtotime($movie->released_date))) !!}</p>
                                    @endif
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
                                                    <span class="rate_span p-0" style="font-size: 25px; color: #fcd408;" >★</span>

                                                    @endfor

                                                </span>
                                            @endif
                                        </p>
                                        <p>{{ Str::limit($movie->details, 40) }}</p>

                                        @auth
                                            @if (auth()->user()->isAdmin == 1)
                                                <p class="mb-3">Status:
                                                    @if ($movie->isPublished == 1)
                                                        <span>
                                                            Published <i class="fa-solid fa-circle-check"
                                                                style="color: #49de2b;"></i>
                                                        </span>
                                                    @else
                                                        <span>

                                                            Not Published <i class="fa-solid fa-circle-xmark"
                                                                style="color: #d81818;"></i>
                                                        </span>
                                                    @endif
                                                </p>
                                                <div class="d-flex">

                                                    <a href="{{ route('movie.edit', $movie->id) }}"
                                                        class="btn btn-secondary ">Edit</a>

                                                    <button type="button" class="btn btn-danger mx-3"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#myModal-{{ $movie->id }}">
                                                        Delete
                                                    </button>
                                                    @include('added_components.modal_delete')


                                                </div>
                                            @endif
                                        @endauth


                                    </div>
                                </header>
                            </div>
                        </a>
                            @include('added_components.ribbon')
                    </section>

                </div>
            @endforeach
        </div>
    </div>
</div>
