<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MembersController;
use App\Http\Controllers\MontagemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Permissão de utilizador
Route::middleware('auth')->group(function () {

    Route::controller(EventController::class)->group(function () {
        Route::get('/encontros', 'index')->name('events.index');
        Route::get('/encontros/inserir', 'create')->name('events.create');
        Route::get('/encontros/edit/{id}', 'edit')->name('events.edit');
        Route::post('/encontros/store', 'store')->name('events.store');
        Route::put('/encontros/update/{id}', 'update')->name('events.update');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::get('/profile/index', 'index')->name('profile.index');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    Route::controller(MembersController::class)->group(function () {
        Route::get('/integrante', 'index')->name('members.index');
        Route::get('/integrante/inserir', 'create')->name('members.create');
        Route::get('/integrante/edit/{id}', 'edit')->name('members.edit');
        Route::post('/integrante/store', 'store')->name('members.store');
        Route::put('/integrante/update/{id}', 'update')->name('members.update');
        Route::delete('/integrante/delete/{id}', 'destroy')->name('members.delete');
        Route::delete('/integrante/delete/{id}', 'destroy')->name('members.delete');

        Route::post('/integrante/import', 'import')->name('members.import');
        Route::get('/integrante/relatorio', 'report')->name('members.report');
    });

    Route::controller(MontagemController::class)->group(function () {
        Route::get('/montagem', 'index')->name('montagem.index');
        Route::post('/montagem/montar', 'montar')->name('montagem.montar');
//        Route::get('/montagem/inserir', 'create')->name('montagem.create');
//        Route::get('/montagem/edit/{id}', 'edit')->name('montagem.edit');
//        Route::post('/montagem/store', 'store')->name('montagem.store');
    });
});

require __DIR__ . '/auth.php';
