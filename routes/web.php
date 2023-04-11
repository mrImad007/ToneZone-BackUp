<?php

use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\BandsController;
use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MusicsController;
use App\Http\Controllers\PlaylistsController;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\MusicLikesController;
use App\Http\Controllers\PlaylistMusicsController;

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

Route::get('/imad',function(){
    return view('imad');
});

////////////////// user \\\\\\\\\\\\\\\\\\\\\\
// home page that load recent play
Route::get('/', [pagesController::class, 'index']);
// register form
Route::get('/register', [UsersController::class, 'create'])->middleware('guest');
// store client data
Route::post('/store', [UsersController::class, 'store']);
// login form
Route::get('/login', [UsersController::class, 'login'])->name('login')->middleware('guest');
// log in user
Route::post('/users/authentification' , [UsersController::class , 'authentification']);
// log out
Route::get('/logout', [UsersController::class, 'logout']);



////////// music likes
// load liked music page
Route::get('/likedmusic', [pagesController::class, 'likedMusic'])->middleware(['auth', 'auth:web']);
// load single 
Route::get('/singleMusic/{music}', [pagesController::class, 'singleMusic'])->middleware(['auth', 'auth:web']);
// like music
Route::get('/likeMusic/{music}/{user}', [MusicLikesController::class, 'likeMusic'])->middleware(['auth', 'auth:web']);
// unlike music
Route::get('/unlikeMusic/{music}/{user}', [MusicLikesController::class, 'unlikeMusic'])->middleware(['auth', 'auth:web']);


////////// comments \\\\\\\\\\\
// store comment
Route::post('/comment/{music}', [CommentsController::class, 'storeComment']);


/////////// user artist \\\\\\\\\\\
Route::get('/artist', [pagesController::class, 'artist'])->middleware(['auth', 'auth:web']);