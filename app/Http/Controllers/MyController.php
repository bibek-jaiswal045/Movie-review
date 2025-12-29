<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['isAdmin'])->except("movie.show");
    }
}
