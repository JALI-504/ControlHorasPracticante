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
        $total_hora = Hora::getTotalSumaHoras()->where('user_id', $user->id)->first();



        return view(
            'livewire.inicio',
            compact('user', 'total_hora'),
            [
                'user' => $user,
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
