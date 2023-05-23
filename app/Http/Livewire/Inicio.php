<?php

namespace App\Http\Livewire;

use App\Models\Carrera;
use App\Models\Centro;
use App\Models\Hora;
use App\Models\Supervisor;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class Inicio extends Component
{

    // public function render()
    // {
    //     $user = User::with('carrera')->get();

    //     // $carrera = Carrera::find($user);
    //     // $centro = Centro::find($user);


    //     return view('livewire.inicio', [
    //         'users' => User::all(),
    //         'supervisors' => Supervisor::all(),
    //         'carreras' => Carrera::all(),
    //         'centros' => Centro::all(),

    //     ])
    //         ->extends('adminlte::page')
    //         ->section('content');
    // }

    public function render()
    {
        $user = auth()->user();
        $horasRequeridas = $user->horas_requeridas;
        $totalHoras = Hora::getTotalSumaHoras()->where('user_id', $user->id)->first();

        return view('livewire.inicio', compact('horasRequeridas', 'totalHoras'),
         [
             'users' => User::all(),
             'supervisors' => Supervisor::all(),
             'carreras' => Carrera::all(),
             'centros' => Centro::all(),

         ])
        ->extends('adminlte::page')
        ->section('content');
    }


}
