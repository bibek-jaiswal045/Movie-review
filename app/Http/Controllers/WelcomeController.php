<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{
    public function index()
    {
        $carousels = Carousel::with('movie')->get();
        // If Cache to store carousel needed 
        // $carousels = Cache::remember('carousel', now()->addHours(5), function(){
        //     return Carousel::with('movie')->get();
        // });

        $movies = Movie::latest()->take(3)->get();
        // If Cache to store movies needed
        // $movies = Cache::remember('movies', now()->addHours(5), function(){
        //     return Movie::latest()->take(3)->get();
        // });

        return view('welcome', ['movies' => $movies, 'carousels' => $carousels]);
    }
}
