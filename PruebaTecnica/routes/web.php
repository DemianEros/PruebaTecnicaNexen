<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::resource('categorias', CategoriaController::class);
Route::get('/categorias/{id}', 'App\Http\Controllers\CategoriaController@show')->name('categorias.show');