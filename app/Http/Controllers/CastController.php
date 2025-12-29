<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cast;
use App\Models\Movie;
use GuzzleHttp\RedirectMiddleware;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $casts = Cast::all();
        return view('cast.index', ['casts' => $casts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cast.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Cast $cast)
    {
        if ( Cast::where('name', request('name'))->exists()) {
            return redirect()->route('cast.index')->with('warning', 'The cast already exists.');
        } else {
            request()->validate([
                // 'movie_id' => 'required|integer|min:1|max:100',
                'name' => 'required|min:2|max:30',
            ]);

            Cast::updateOrcreate([
                // 'movie_id' => request('movie_id'),
                'name' => request('name'),
            ]);
            return redirect()->route('cast.index')->with('success', 'The cast has been added.');
        }

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
    public function edit(Cast $cast)
    {
        // return view('cast.edit', ['cast' => $cast]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Cast $cast)
    {
        // request()->validate([
        //     // 'movie_id' => 'required|integer|min:1|max:100',
        //     'name' => 'required|min:2|max:30',
        // ]);

        // $cast->update([
        //     // 'movie_id' => request('movie_id'),
        //     'name' => request('name'),
        // ]);

        // return redirect()->route('cast.index')->with('success', 'The cast has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cast $cast)
    {
        $cast->delete();
        return redirect()->route('cast.index')->with('danger', 'The cast has been deleted.');
    }
}
