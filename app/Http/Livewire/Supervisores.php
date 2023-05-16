<?php

namespace App\Http\Livewire;

use App\Models\Supervisor;
use Livewire\Component;

class Supervisores extends Component
{
    public function render()
    {
        return view('livewire.supervisores', [
            'supervisors' =>Supervisor::all()
        ])
        ->extends('adminlte::page')
        ->section('content');
    }

    public function delete  ($id){
        
        // dd($id);

        $Supervisor = Supervisor::find($id);
        
        $Supervisor->delete();

        return redirect()->route('sup.index');
    }
}

