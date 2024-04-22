<?php
use App\Http\Controllers\StagiaireController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/Stagiaire', function () {
    return view('Stagiaire');
});


Route::get('/Attestation', function () {
    return view('Attestation');
});


Route::get('/Announcement', function () {
    return view('Announcement');
});
Route::get('/addStg', function () {
    return view('addStg');
});
Route::get('/EditStg', function () {
    return view('EditStg');
});

Route::apiResource('/api/stagiaires', StagiaireController::class);
