<?php

use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\InteractionsController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\PlaylistSongController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::resource('/canciones',SongsController::class)->middleware(['auth', 'verified']);
Route::resource('/playlist',PlaylistController::class);
Route::resource('/genero',GeneroController::class);
Route::resource('/artista',ArtistaController::class);
Route::resource('/playlistsong',PlaylistSongController::class);
Route::resource('/interactions',InteractionsController::class);

Route::middleware('auth')->group(function () {
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
