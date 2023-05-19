<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $movies = Movie::latest()->paginate(3);
        

        return view('admin.index',['movies' => $movies]);
    }
}
