<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Carousel;
use Illuminate\Support\Facades\Session;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index($movie_id)
    public function index()
    {
        $carousels = Carousel::with('movie')->get();
        // dd($carousels);

        return view('carousel.index')->with('carousels', $carousels);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all = Movie::all();
        $carousels = Carousel::with('movie')->get();
        return view('carousel.create', ['all' => $all, 'carousels' => $carousels]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Carousel::whereIn('movie_id', request('movie_id'))->exists()) {
            return redirect()->route('carousel.index')->with('warning', 'The movie already exists.');
        } else {
            request()->validate([
                'movie_id' => 'required',
            ]);
            // dd(request('movie_id'));
            foreach (request('movie_id') as $movie) {
                Carousel::create([
                    'movie_id' => $movie,
                ]);
            }

            return redirect()->route('homepage');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carousel $carousel)
    {
        $carousel->delete();
        return redirect()->route('homepage');
    }
}
