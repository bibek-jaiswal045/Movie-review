<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Movie;
class MovieCreate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(Movie $movie): array
    {
        return [
            
        // if (Movie::where('name', request('name'))->exists()) {
        //     return redirect()->route('admindashboard')->with('warning', 'The Movie already exists.');
        // } else {


        //     $casts = collect(request('casts'))->implode(',');
        //     $genres = collect(request('genre'))->implode(',');
        //     request()->validate([
        //         'name' => 'required|min:1|max:60',
        //         'isPublished' => 'required|integer|min:0|max:1',
        //         'image' => 'required|mimes:png,jpg,jfif',
        //         'genre' => 'required',
        //         'released_date' => 'required',
        //         'director' => 'required|min:3|max:60',
        //         'duration' => 'required|min:5|max:30',
        //         'casts' => 'required',
        //         'details' => 'required|min:50|max:2000',
        //     ]);


        //     $movieimage = null;
        //     if (request()->hasfile('image')) {
        //         $image = request()->file('image');
        //         $movieimage = $image->getClientOriginalName();
        //         $image->move(public_path('movieimages'), $movieimage);
        //     }

        //     $movie_id = Movie::create([
        //         'name' => request('name'),
        //         'isPublished' => request('isPublished'),
        //         'image' => $movieimage,
        //         'genre' => $genres,
        //         'released_date' => request('released_date'),
        //         'director' => request('director'),
        //         'duration' => request('duration'),
        //         'casts' => $casts,
        //         'details' => request('details'),
        //     ]);


        //     $cast_arr = request('casts');
        //     $db_casts = Cast::all();
        //     foreach ($db_casts as $name) {
        //         $index = 0;
        //         foreach ($cast_arr as $inp_cast) {
        //             if ($inp_cast == $name->name) {

        //                 $save = Movie_Cast::create([
        //                     'movie_id' => $movie_id->id,
        //                     'casts_id' => $name->id,
        //                 ]);
        //                 $save->save();
        //             } else {
        //                 // dd($inp_cast);
        //             }
        //         }
        //         $index++;
        //     }


        //     $genre_arr = request('genre');
        //     $db_genre = Genre::all();
        //     foreach ($db_genre as $genre) {
        //         $indexes = 0;
        //         foreach ($genre_arr as $inp_genre) {
        //             if ($inp_genre == $genre->genre) {

        //                 $save_genre = Movie_Genre::create([
        //                     'movie_id' => $movie_id->id,
        //                     'genre_id' => $genre->id,
        //                 ]);
        //                 $save_genre->save();
        //             } else {
        //                 // dd($inp_genre);
        //             }
        //         }
        //         $indexes++;
        //     }



        //     return redirect()->route('admindashboard');
        // }
        ];
    }
}
