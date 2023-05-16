<?php

namespace App\Http\Livewire;

use App\Models\Carrera;
use Livewire\Component;

class Carreras extends Component
{
    public function render()
    {
        return view('livewire.carreras',  [
            'carreras' =>Carrera::all()
        ])
        ->extends('adminlte::page')
        ->section('content');
    }

    public function delete  ($id){
        
        // dd($id);

        $Supervisor = Carrera::find($id);
        
        $Supervisor->delete();

        return redirect()->route('carrera.index');
    }
}
