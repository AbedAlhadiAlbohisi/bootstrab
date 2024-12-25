<?php

use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/', 'dash');
Route::view('/parent', 'parent');

Route::resource('/cities' ,CityController::class);


