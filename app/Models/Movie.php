<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    
    protected $fillable = ['name','isPublished','genre','status','carousel_image', 'image','director', 'duration', 'casts', 'details','released_date'];
    protected $casts = [
        'released_date' => 'datetime',
    ];
    
    public function ratings()
    {
        return $this->hasMany(Rating::class, 'movie_id');
    }
    
    public function casts()
    {
        return $this->belongsToMany(Cast::class,'movie_id', 'casts_id');
    }



    public function genres()
    {
        return $this->belongsToMany(Genre::class,'movie_id', 'genre_id');
    }

    public function carousel(){
        return $this->hasOne(Carousel::class, 'movie_id');
    }

    public function status(){
        return $this->hasOne(Status::class, 'movie_id');
    }
    
    
    

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){

            $query
                ->where('name','like', '%'.$search . '%')
                ->orWhere('details', 'like', '%'.$search . '%')
                ->orWhere('casts', 'like', '%'.$search . '%');
                

        });
    }
    
}
