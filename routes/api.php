<?php

use App\Http\Controllers\StagiaireController;

use Illuminate\Http\Request;


Route::get('/users', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::apiResource('stagiaires', StagiaireController::class);
Route::apiResource('stagiaires', StagiaireController::class);
