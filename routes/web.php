<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Inicio;
use App\Http\Livewire\Usuarios;
use App\Http\Livewire\UsuariosCreate;
use App\Http\Livewire\UsuariosUpdate;

Auth::routes(['login' => true]);

Auth::routes(['register' => true]);


Route::group(['middleware' => 'auth'], function () {

    // Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

    Route::get('/', Inicio::class)->name('inicio')->middleware('auth');

    Route::prefix('usuarios')->group(function () {
        Route::get('index', Usuarios::class)->name('usuario.index')->middleware('auth');
        Route::get('create', UsuariosCreate::class)->name('usuario.create')->middleware('auth');
        Route::get('update/{id}', UsuariosUpdate::class)->name('usuario.update')->middleware('auth');
    });



});


