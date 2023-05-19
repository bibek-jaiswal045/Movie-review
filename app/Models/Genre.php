<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['genre'];

    public function movies()
    {
        return $this->belongsToMany(Movie::class,'movie_id', 'genre_id');
    }
    
    
    
}
