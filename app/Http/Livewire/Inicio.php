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
    public function render()
    {
        $user = auth()->user();
        $total_hora = Hora::getTotalSumaHoras()->where('user_id', $user->id);        
        $users = User::with('carrera.centro')->get(); // Obtener todos los usuarios con la relación carrera cargada

        // $currentUser = User::findOrFail($user->id);
        // $width = 0;

        //  dd($total_hora_id);
     

        return view(
            'livewire.inicio',
            compact('user', 'total_hora', 'users'),
            [              
                'supervisors' => Supervisor::all(),
                'carreras' => Carrera::all(),
                'centros' => Centro::all(),
                'horas' => Hora::all(),

            ]
        ) 
            ->extends('adminlte::page')
            ->section('content');
    }
}
