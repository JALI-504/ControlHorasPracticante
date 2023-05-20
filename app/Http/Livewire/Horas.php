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
            'horas' => Hora::all()
        ])
        ->extends('adminlte::page')
        ->section('content');
    }

    public function delete($id){

        $User = User::find($id);
        
        $User->delete();
        return redirect()->route('hora.index');
    }

    public function sumatotal(){
        $this->total = Hora::table('horas')
        ->sum('total_horas');
    }
}