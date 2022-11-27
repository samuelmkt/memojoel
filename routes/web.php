<?php

use App\Http\Controllers\ClaimController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoteFileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentTpController;
use App\Http\Controllers\TpController;

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::resource('students.studentTp', StudentTpController::class)->shallow();
    Route::get('/tps/{tp}/resultats', [ProfesseurController::class, 'resultatsTp'])->name('resultatsTp');
    Route::resource('claims', ClaimController::class);
    Route::put('claims/{claim}/class', [ClaimController::class, 'class'])->name('claims.class');
    Route::resource('professeurs', ProfesseurController::class);
    Route::resource('students', StudentController::class);
    Route::resource('tps', TpController::class);
    Route::resource('notes', NoteFileController::class);
    Route::prefix('imports')->group(function () {
        Route::name('imports.')->group(function () {
            Route::view('professeurs', 'professeurs.imports.index');
            Route::post('professeurs', [ProfesseurController::class, 'imports'])->name('professeurs');
            Route::view('students', 'students.imports.index');
            Route::post('students', [StudentController::class, 'imports'])->name('students');
        });
    });
});

require __DIR__.'/auth.php';

