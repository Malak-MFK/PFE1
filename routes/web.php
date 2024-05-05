<?php
use App\Http\Controllers\StagiaireController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\PDFController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\DisciplineController;

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

// 

Route::get('/login', function () {
    return view('Login');
});

Route::get('/register', function () {
    return view('Register');
});

Route::post('/api/register', [AuthController::class, 'register']);
Route::post('/api/login', [AuthController::class, 'login']);

// A

Route::get('/formateurs/{id}/emploi', [FormateurController::class, 'showEmploi']);

Route::get('/profile/{id}', [FormateurController::class, 'profile']);

Route::get('/formateurs/{id}', [FormateurController::class, 'showProfile'])->name('formateurs.profile');
Route::get('/liste-stagiaires', function () {
    $stagiaires = App\Models\Stagiaire::all();
    return view('liste_stagiaires', ['stagiaires' => $stagiaires]);
})->name('stagiairesD.index');



Route::get('/stagiaires', [StagiaireController::class, 'index'])->name('stagiaires.index');

// / Route pour afficher le formulaire d'ajout de note pour un stagiaire spécifique
Route::get('/stagiaires/{stagiaire_id}/notes/create', [NoteController::class, 'create'])->name('notes.create');

// Route pour enregistrer une nouvelle note pour un stagiaire spécifique
Route::post('/stagiaires/{stagiaire_id}/notes', [NoteController::class, 'store'])->name('notes.store');
Route::get('/notes/{stagiaire_id}/edit', [NoteController::class, 'edit']);

// Route::put('/notes/{note_id}/update', [NoteController::class, 'update']);
Route::put('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');


Route::delete('/notes.destroy/{stagiaire_id}', [NoteController::class, 'edite'])->name('notes.destroy');






Route::get('/stagiaires', [StagiaireController::class, 'showAll'])->name('stagiaires.index');
Route::get('/stagiaires/{stagiaire}/discipline/newCreate', [DisciplineController::class, 'newCreate'])->name('disciplines.newCreate');

Route::get('/stagiaires/{stagiaire}/discipline', [DisciplineController::class, 'store'])->name('disciplines.store');


Route::get('/absences', [AbsenceController::class, 'index'])->name('absences.index');
Route::get('/absences/create', [AbsenceController::class, 'create'])->name('absences.create');
Route::post('/absences', [AbsenceController::class, 'store'])->name('absences.store');