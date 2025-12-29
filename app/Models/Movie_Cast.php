<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie_Cast extends Model
{
    use HasFactory;
    protected $fillable = ['movie_id', 'casts_id'];

    public $timestamps = false;
}
