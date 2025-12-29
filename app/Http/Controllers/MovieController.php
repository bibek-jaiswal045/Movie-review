<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Cast;
use App\Models\Status;
use App\Models\Genre;
use App\Models\Movie_Cast;
use App\Models\Movie_Genre;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Response;

class MovieController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::latest()->paginate(10);
        // $movies = Movie::latest()->paginate(3);


        // return new Response($movies);
        // return view('movie.index')->with(new Response($movies));
        return view('movie.index', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movie = Movie::all();
        $statuses = Status::all();
        $casts = Cast::all();
        $genres = Genre::all();
        return view('movie.create', ['casts' => $casts, 'genres' => $genres, 'movie' => $movie, 'statuses' => $statuses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {




        if (Movie::where('name', request('name'))->exists()) {
            return redirect()->route('admindashboard')->with('warning', 'The Movie already exists.');
        } else {


            $casts = collect(request('casts'))->implode(',');
            $genres = collect(request('genre'))->implode(',');
            request()->validate([
                'name' => 'required|min:1|max:60',
                'isPublished' => 'required|integer|min:0|max:1',
                'image' => 'required|mimes:png,jpg,jfif',
                'carousel_image' => 'required|mimes:png,jpg,jfif',
                'genre' => 'required',
                'status' => 'required|min:6|max:25',
                'released_date' => 'required',
                'director' => 'required|min:3|max:60',
                'duration' => 'required|min:5|max:30',
                'casts' => 'required',
                'details' => 'required|min:50|max:2000',
            ]);

            if(!is_dir(public_path('movieimages'))) {
                mkdir(public_path('movieimages'), 0755, true);
            }
            if(!is_dir(public_path('carouselimages'))) {
                mkdir(public_path('carouselimages'), 0755, true);
            }

            $movieimage = null;
            if (request()->hasfile('image')) {
                $image = request()->file('image');
                $movieimage = $image->getClientOriginalName();
                $image->move(public_path('movieimages'), $movieimage);
            }

            $carouselImage = null;
            if(request()->hasFile('carousel_image')){
                $cImage = request()->file('carousel_image');
                $carouselImage = $cImage->getClientOriginalName();
                $cImage->move(public_path('carouselimages'), $carouselImage);
            }

            $movie_id = Movie::create([
                'name' => request('name'),
                'isPublished' => request('isPublished'),
                'image' => $movieimage,
                'carousel_image' => $carouselImage,
                'genre' => $genres,
                'status' => request('status'),
                'released_date' => request('released_date'),
                'director' => request('director'),
                'duration' => request('duration'),
                'casts' => $casts,
                'details' => request('details'),
            ]);


            $cast_arr = request('casts');
            $db_casts = Cast::all();
            foreach ($db_casts as $name) {
                $index = 0;
                foreach ($cast_arr as $inp_cast) {
                    if ($inp_cast == $name->name) {

                        $save = Movie_Cast::create([
                            'movie_id' => $movie_id->id,
                            'casts_id' => $name->id,
                        ]);
                        $save->save();
                    } else {
                        // dd($inp_cast);
                    }
                }
                $index++;
            }


            $genre_arr = request('genre');
            $db_genre = Genre::all();
            foreach ($db_genre as $genre) {
                $indexes = 0;
                foreach ($genre_arr as $inp_genre) {
                    if ($inp_genre == $genre->genre) {

                        $save_genre = Movie_Genre::create([
                            'movie_id' => $movie_id->id,
                            'genre_id' => $genre->id,
                        ]);
                        $save_genre->save();
                    } else {
                        // dd($inp_genre);
                    }
                }
                $indexes++;
            }



            return redirect()->route('admindashboard');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        // $this->middleware('isAdmin')->except('movie.show');

        return view('movie.show', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $all_casts = explode(',', $movie->casts);
        $all_genres = explode(',', $movie->genre);
        $casts = Cast::all();
        $statuses = Status::all();

        $genres = Genre::all();
        return view('movie.edit', ['movie' => $movie, 'casts' => $casts, 'genres' => $genres, 'all_casts' => $all_casts, 'all_genres' => $all_genres, 'statuses' => $statuses]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Movie $movie)
    {
        request()->validate([
            'name' => 'required|min:1|max:60',
            // 'image' => 'required|mimes:png,jpg,jfif',
            'isPublished' => 'required|integer|min:0|max:1',
            'director' => 'required|min:3|max:60',
            'duration' => 'required|min:5|max:30',
            'released_date' => 'required',
            'genre' => 'required',
            'status' => 'required|min:6|max:25',
            'casts' => 'required',
            'details' => 'required|min:50|max:2000',
        ]);


        $movieimage = $movie->image;
        if (request()->hasfile('image')) {
            $image = request()->file('image');
            $movieimage = $image->getClientOriginalName();
            $image->move(public_path('movieimages'), $movieimage);
        }

        $carouselImage = $movie->carousel_image;
        if(request()->hasFile('carousel_image')){
            $cImage = request()->file('carousel_image');
            $carouselImage = $cImage->getClientOriginalName();
            $cImage->move(public_path('carouselimages'), $carouselImage);
        }

        $explode_genre = implode(',', request('genre'));
        $explode_casts = implode(',', request('casts'));

        $movie->update([
            'name' => request('name'),
            'isPublished' => request('isPublished'),
            'image' => $movieimage,
            'carousel_image' => $carouselImage,
            'released_date' => request('released_date'),
            'director' => request('director'),
            'duration' => request('duration'),
            'genre' => $explode_genre,
            'status' => request('status'),
            'casts' => $explode_casts,
            'details' => request('details'),
        ]);

        return redirect()->route('admindashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        unlink('movieimages/' . $movie->image);
        unlink('carouselimages/' . $movie->carousel_image);
        if (Carousel::where('id', $movie->id)->exists()) {
            $movie = Carousel::where('id', $movie->id)->delete();
        }
        $movie->delete();
        return redirect()->route('admindashboard');
    }
}
