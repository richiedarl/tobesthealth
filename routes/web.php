<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('jobs', AdminJobController::class);
});

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store']);


