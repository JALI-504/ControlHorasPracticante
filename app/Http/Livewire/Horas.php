<?php

namespace App\Http\Livewire;

use App\Models\Hora;
use Livewire\Component;

class Horas extends Component
{
    public $total_horas;
    public $total;
    
    public function render()
    {
        return view('livewire.horas', [
            'horas' => Hora::all()
        ])
        ->extends('adminlte::page')
        ->section('content');
    }

    public function delete  ($id){
        
        // dd($id);

        $Hora = Hora::find($id);
        
        $Hora->delete();

        return redirect()->route('hora.index');
    }

    public function sumatotal(){
        $this->total = Hora::table('horas')
        ->sum('total_horas');
    }
}


