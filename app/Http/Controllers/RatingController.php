<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function newstore(Movie $movie)
    {
        // dd($movie->id);
        request()->validate([
            // 'movie_id' => 'required|integer|min:1|max:100',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Rating::create([
            'user_id' => auth()->user()->id,
            'movie_id' => $movie->id,
            'ratings' => request('rating'),
        ]);


        return back()->with('success', 'Thanks for the review, your review has been added.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(Rating $rating)
    {
        $rating -> delete();
        return back()->with('danger', 'Your review has been deleted.');
    }
}
