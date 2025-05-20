<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PresencaController;
use App\Http\Controllers\AlunoController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/* ─────────────────────────────────────────────
 |  Página pública inicial
 ───────────────────────────────────────────── */
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin'       => Route::has('login'),
        'canRegister'    => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion'     => PHP_VERSION,
    ]);
});

/* ─────────────────────────────────────────────
 |  Dashboard (protegido)
 ───────────────────────────────────────────── */
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/* ─────────────────────────────────────────────
 |  Exportar PDF de presenças (protegido)
 ───────────────────────────────────────────── */
Route::get('/presencas/pdf', [PresencaController::class, 'exportarPdf'])
      ->middleware('auth')
      ->name('presencas.pdf');

/* ─────────────────────────────────────────────
 |  Grupo protegido por autenticação
 ───────────────────────────────────────────── */
Route::middleware('auth')->group(function () {

    /* ----- Perfil ----- */
    Route::get   ('/profile',  [ProfileController::class, 'edit' ])->name('profile.edit');
    Route::patch ('/profile',  [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile',  [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* ----- Presenças ----- */
    Route::post('/presencas',          [PresencaController::class, 'store'     ])->name('presencas.store');
    Route::get ('/presencas/{data}',   [PresencaController::class, 'getByDate' ])->name('presencas.data');

    /* ----- Alunos ----- */
    Route::get ('/alunos', [AlunoController::class, 'index'])->name('alunos.index');
    Route::post('/alunos', [AlunoController::class, 'store'])->name('alunos.store');

    /* ----- Salas ----- */
    Route::prefix('/salas')->group(function () {
        Route::inertia('/sala1', 'Sala1')->name('sala1');   // Usa helper inertia para evitar controlador vazio
        Route::inertia('/sala2', 'Sala2')->name('sala2');
        Route::inertia('/sala3', 'Sala3')->name('sala3');
    });
});

/* ─────────────────────────────────────────────
 |  Rotas de autenticação geradas pelo Breeze / Jetstream
 ───────────────────────────────────────────── */
require __DIR__ . '/auth.php';
