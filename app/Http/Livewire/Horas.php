<?php

namespace App\Http\Livewire;

use App\Models\Hora;
use App\Models\User;
use Livewire\Component;

class Horas extends Component
{
    
    public $total_horas;
    public $total;
    
    
    public function render()
    {
        return view('livewire.horas', [
            'users' => User::all(),
            'horas' => Hora::all(),
            'users' => User::where('estado' , true)->get()
        ])
        ->extends('adminlte::page')
        ->section('content');
    }

    public function sumatotal(){
        $this->total = Hora::table('horas')
        ->sum('total_horas');
    }
}