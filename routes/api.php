<?php

use App\Http\Controllers\StagiaireController;
use App\Http\Controllers\AuthController;

use Illuminate\Http\Request;


Route::get('/users', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::apiResource('stagiaires', StagiaireController::class);
Route::apiResource('stagiaires', StagiaireController::class);

// 
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

