<?php

use App\Http\Livewire\Usuarios;
use App\Http\Livewire\UsuariosCreate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['login' => true]);



Route::group(['middleware' => 'auth'], function () {


    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
});

Route::prefix('usuarios')->group(function () {
    Route::get('index', Usuarios::class)->name('usuario.index')->middleware('auth');
    Route::get('create', UsuariosCreate::class)->name('usuario.create')->middleware('auth');
    // Route::get('update/{id}', PracticanteCreate::class)->name('hp.update')->middleware('auth');
});