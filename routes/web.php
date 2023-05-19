<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MovieWatchController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\StatusController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeController::class, 'index'])->name('homepage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admindashboard', [AdminController::class, 'index'])->name('admindashboard')->middleware(['isAdmin','verified']);

Route::resource('movie', MovieController::class)->middleware('isAdmin')->except(['show']);

Route::get('movies', [MovieWatchController::class, 'index'])->name('clientindex');
Route::get('movies/{movie}', [MovieWatchController::class, 'show'])->name('showmovie');

Route::resource('rating', RatingController::class)->except(['store']);

Route::post('movies/{movie}/store',[RatingController::class, 'newstore'])->name('addedstore');

// Socialite

Route::get('redirect/{driver}', [SocialiteController::class, 'redirectHandler'])->name('redirectuser');

Route::get('{driver}/callback', [SocialiteController::class, 'callbackHandler'])->name('callbackuser');

// Further Added.

Route::resource('cast', CastController::class)->middleware('isAdmin');    

Route::resource('genre', GenreController::class)->middleware('isAdmin');    
    
Route::get('calendar', [MovieWatchController::class, 'calendar'])->name('calendar');

Route::resource('carousel', CarouselController::class)->middleware('isAdmin');

Route::resource('status', StatusController::class)->middleware('isAdmin');
