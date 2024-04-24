<?php
use App\Http\Controllers\StagiaireController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PDFController;


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
Route::get('/Formateur', function () {
    return view('Formateur');
});
Route::get('/addStg', function () {
    return view('addStg');
});
Route::get('/EditStg', function () {
    return view('EditStg');
});

Route::apiResource('/api/stagiaires', StagiaireController::class);
Route::apiResource('/api/formateurs', FormateurController::class);
Route::apiResource('/api/announcements', AnnouncementController::class);
Route::get('/export-pdf/{id}', [PDFController::class, 'exportPDF']);
