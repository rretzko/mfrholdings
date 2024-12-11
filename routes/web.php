<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('reachOut', App\Http\Controllers\ReachOutController::class)
    ->name('reachOut');
