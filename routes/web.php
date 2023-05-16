<?php

use App\Http\Livewire\AsignarRoles;
use App\Http\Livewire\Carreras;
use App\Http\Livewire\Centros;
use App\Http\Livewire\CentrosCreate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Inicio;
use App\Http\Livewire\Perfil;
use App\Http\Livewire\Usuarios;
use App\Http\Livewire\UsuariosCreate;
// use App\Http\Livewire\UsuariosUpdate;

Auth::routes(['login' => true]);

Auth::routes(['register' => true]);


Route::group(['middleware' => 'auth'], function () {

    // Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

    Route::get('/', Inicio::class)->name('inicio')->middleware('auth');

    Route::prefix('usuarios')->group(function () {
        Route::get('index', Usuarios::class)->name('usuario.index')->middleware('auth');
        Route::get('create', UsuariosCreate::class)->name('usuario.create')->middleware('auth');
        Route::get('perfil/{id}', Perfil::class)->name('usuario.perfil')->middleware('auth');
        Route::get('update/{id}', UsuariosCreate::class)->name('usuario.update')->middleware('auth');
        //Route::get('asignar/{id}', AsignarRoles::class)->name('usuario.roles')->middleware('auth');

    });

    Route::group(['middleware' => ['role:Admin', 'auth']], function () {
        Route::get('asignar/{id}', AsignarRoles::class)->name('usuario.roles');
    });

    Route::prefix('centros')->group(function () {
        Route::get('index', Centros::class)->name('centro.index')->middleware('auth');
        Route::get('create', CentrosCreate::class)->name('centro.create')->middleware('auth');
        Route::get('update/{id}', CentrosCreate::class)->name('centro.update')->middleware('auth');
    });

    Route::prefix('carreras')->group(function () {
        Route::get('index', Carreras::class)->name('carrera.index')->middleware('auth');
        // Route::get('create', CentrosCreate::class)->name('carrera.create')->middleware('auth');
        // Route::get('update/{id}', CentrosCreate::class)->name('carrera.update')->middleware('auth');
    });

});


