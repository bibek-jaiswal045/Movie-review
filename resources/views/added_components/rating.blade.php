<div class="ratings">
   

    @auth


        @if ($movie->released_date < $current_time)

            @if (auth()->user()->isAdmin == 0 && $ratings < 1)
                <form action="{{ route('rating.store') }}" method="POST">

                    @csrf
                    <input type="hidden" name="movie_id" id="" value="{{ $movie->id }}">
                    <span>
                        Rating:
                        <i class="fa-solid fa-star" style="color: #edc707;"></i>
                    </span>
                    <select class="form-select w-25" aria-label="Default select example" name="rating">

                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <button type="submit" class="btn btn-warning mt-4 text-white">Add rating</button>
                </form>
                
            @else
                <span></span>
            @endif
        @endif
    @endauth


</div>

<div class="ratingscount mt-3">
    @php
        
        $avg_rating = $movie->ratings->avg('ratings');
        // $j = number_format($avg_rating);
    @endphp
    @if ($avg_rating == 0)
        <span>No reviews yet!</span>
    @else
        <h4 class="my-4">All Reviews</h4>
    @endif
    <p>

        @foreach ($movie->ratings as $ratings)
            <p>{{ $ratings->user->name }} <span>{{ $ratings->ratings }}<i class="fa-solid fa-star"
                        style="color: #edc707;"></i></span></p>
        @endforeach


    </p>
</div>
