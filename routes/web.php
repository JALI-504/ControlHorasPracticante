<?php

use App\Http\Livewire\AsignarRoles;
use App\Http\Livewire\Carreras;
use App\Http\Livewire\CarrerasCraete;
use App\Http\Livewire\Centros;
use App\Http\Livewire\CentrosCreate;
use App\Http\Livewire\Deptos;
use App\Http\Livewire\DeptosCreate;
use App\Http\Livewire\Horas;
use App\Http\Livewire\HorasCreate;
use App\Http\Livewire\HorasRegistro;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\Inicio;
use App\Http\Livewire\PdfGenerator;
use App\Http\Livewire\Perfil;
use App\Http\Livewire\SupervisorCreate;
use App\Http\Livewire\Supervisores;
use App\Http\Livewire\UploadFile;
use App\Http\Livewire\Usuarios;
use App\Http\Livewire\UsuariosCreate;


    
Auth::routes();


// Route::group(['middleware' => 'auth'], function () {



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
        Route::get('create', CarrerasCraete::class)->name('carrera.create')->middleware('auth');
        Route::get('update/{id}', CarrerasCraete::class)->name('carrera.update')->middleware('auth');
    });

    Route::prefix('supervisores')->group(function () {
        Route::get('index', Supervisores::class)->name('sup.index')->middleware('auth');
        Route::get('create', SupervisorCreate::class)->name('sup.create')->middleware('auth');
        Route::get('update/{id}', SupervisorCreate::class)->name('sup.update')->middleware('auth');
    });

    Route::prefix('horas')->group(function () {
        Route::get('index', Horas::class)->name('hora.index')->middleware('auth');
        Route::get('registro/{id}', HorasRegistro::class)->name('hora.registro')->middleware('auth');
        Route::get('create', HorasCreate::class)->name('hora.create')->middleware('auth');
        Route::get('update/{id}', HorasCreate::class)->name('hora.update')->middleware('auth');
    });

    Route::prefix('deptos')->group(function () {
        Route::get('index', Deptos::class)->name('depto.index')->middleware('auth');
        Route::get('create', DeptosCreate::class)->name('depto.create')->middleware('auth');
        Route::get('update/{id}', DeptosCreate::class)->name('depto.update')->middleware('auth');
    });

    Route::get('constancias', PdfGenerator::class)->name('constancia')->middleware('auth');


// });


