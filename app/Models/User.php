<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;

// use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'isAdmin',
        'email',
        'password',
        'provider_id',
        // 'provider_name',
        // 'github_token',
        // 'github_refresh_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ratings(){
       return $this->hasMany(Rating::class, 'user_id');
    }

    public function socialites()
    {

        return $this->hasMany(Socialite::class, 'user_id');
    }
    
    
    
}
