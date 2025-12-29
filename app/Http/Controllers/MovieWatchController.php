<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movie;
use App\Models\Status;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MovieWatchController extends Controller
{
    public function index()
    {
        $movies = Movie::latest()->where('isPublished', 1)->filter(request(['search']))->paginate(3)->withQueryString();
        return view('clientside.index', ['movies' => $movies]);
    }
    public function show($id)
    {
        $movie = Movie::where('id', $id)->firstorFail();
        if (auth()->user()) {

            $ratings = Rating::where('user_id', auth()->user()->id)->where('movie_id', $movie->id)->count();
            return view('clientside.show', ['movie' => $movie, 'ratings' => $ratings]);
        } else {
            return view('clientside.show', ['movie' => $movie]);
        }
    }

    public function calendar()
    {
        $movies = Movie::all();
        $statuses = Status::all();

        return view('clientside.calendar', ['movies' => $movies, 'statuses' => $statuses]);
    }
}
