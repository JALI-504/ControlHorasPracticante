<?php

namespace App\Http\Livewire;

use App\Models\Depto;
use Livewire\Component;

class Deptos extends Component
{
   
    public function render()
    {
        return view('livewire.deptos',  [
            'deptos' =>Depto::all()
        ])
        ->extends('adminlte::page')
        ->section('content');
    }

    public function delete($id){
        
        // dd($id);

        $depto = Depto::find($id);
        
        $depto->delete();

        return redirect()->route('depto.index');
    }

}
