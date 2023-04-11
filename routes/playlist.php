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


///// Playlist 
// playlist page
Route::get('/playlist', [pagesController::class, 'playlist'])->middleware(['auth', 'auth:web']);
// load create playlist form
Route::get('/createPlaylist', [PlaylistsController::class, 'playlistForm'])->middleware(['auth', 'auth:web']);
// load create playlist form
Route::post('/storeplaylist', [PlaylistsController::class, 'addPlaylist']);
// load single playlist page that has musics
Route::get('/playlist/{playlist}', [pagesController::class, 'signlePlaylist'])->middleware(['auth', 'auth:web']);
// edit playlist
Route::get('/editPlaylist/{playlist}', [PlaylistsController::class, 'editPlaylistForm']);
// store edit playlist
Route::put('/storeEditPlaylist/{playlist}', [PlaylistsController::class , 'storeEditPlaylist']);
// delete playlist
Route::get('/deletePlaylist/{playlist}', [PlaylistsController::class, 'deletePlaylist']);


////////// playlist music
// add to playlist music 
Route::get('/addToPlaylist/{playlist}/{music}', [PlaylistMusicsController::class, 'addToPlaylist'])->middleware(['auth', 'auth:web']);

// delete music from playlist
Route::get('/deleteMusic/{id}', [PlaylistMusicsController::class, 'deletePlaylistMusic'])->middleware(['auth', 'auth:web']);
