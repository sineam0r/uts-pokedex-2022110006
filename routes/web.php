<?php

use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/pokemon', function () {
    return view('pokemon.index');
});

// Route::get('/', [PokemonController::class, 'index'])->name('pokemon.index');


Route::resource('pokemon', PokemonController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
