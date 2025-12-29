<head>

    <style>
        * {
            box-sizing: border-box;
        }

        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        .rating-container .form-control:hover,
        .rating-container .form-control:focus {
            background: #fff;
            border: 1px solid #ced4da;
        }

        .rating-container textarea:focus,
        .rating-container input:focus {
            color: #000;
        }

        .fa-stack {
            font-size: 25px;
            color: #ffc700;
        }

        /* .rating_total {
            display: none;
        } */

        .stars{
            cursor: pointer;
            position: relative;
            text-align: left;
        }
        
        .stars .rating_total{
            visibility: hidden;
            width: 50px;
            background-color: #ffc700;
            color: #ffffff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            bottom: 0px;
            left: 160px;
            z-index: 1; 
         
        }

        .stars:hover .rating_total{
            visibility: visible;
        }

        /* End */
    </style>
</head>

<div class="ratings">


    @auth


        @if ($movie->released_date < $current_time)
            @if (auth()->user()->isAdmin == 0 && $ratings < 1)
                <form action="{{ route('addedstore', $movie->id) }}" method="POST">

                    @csrf
                    <div class="rate">
                        <input type="radio" id="star5" class="rate" name="rating" value="5"  onclick="this.form.submit()"/>
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" class="rate" name="rating" value="4"  onclick="this.form.submit()"/>
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" class="rate" name="rating" value="3"  onclick="this.form.submit()"/>
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" class="rate" name="rating" value="2" onclick="this.form.submit()">
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" class="rate" name="rating" value="1"  onclick="this.form.submit()"/>
                        <label for="star1" title="text">1 star</label>
                    </div>

                    {{-- <button type="submit" class="btn btn-warning mx-5 text-white d-block">Add rating</button> --}}
                </form>
            @else
                <p></p>
            @endif
        @endif
    @endauth


</div>

<div class="ratingscount mt-3">
    @php
        
        $avg_rating = $movie->ratings->avg('ratings');
        $j = number_format($avg_rating, 2);
        $k = round($j, 1);
        $rating = $k;
    @endphp
    @if ($avg_rating == 0)
        <p>No reviews yet!</p>
    @else
        <h4 class="my-4">All Reviews</h4>



    <p class="stars">
        <span class="rating_total">{{ $k }}</span>

        @foreach (range(1, 5) as $i)
            <span class="fa-stack" style="width:1em">
                <i class="far fa-star fa-stack-1x"></i>

                @if ($rating > 0)
                    @if ($rating < 0.2 || $rating > 0.8)
                        <i class="fas fa-star fa-stack-1x"></i>
                    @else
                        <i class="fas fa-star-half fa-stack-1x"></i>
                    @endif
                @endif
                @php $rating--; @endphp
            </span>
        @endforeach


    </p>
    @endif


    <p>

        @foreach ($movie->ratings as $ratings)
            <p>{{ $ratings->user->name }} :<span>
                    {{ $ratings->ratings }}
                    <span class="rate_span" style="font-size: 35px; color: #fcd408;">★ </span>
                </span>
            </p>
        @endforeach


    </p>
</div>
