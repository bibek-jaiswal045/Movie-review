<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $fillable = ['movie_id', 'status'];

    public function movies(){
        return $this->belongsTo(Movie::class);
    }
}
