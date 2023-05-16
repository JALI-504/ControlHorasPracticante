<?php

namespace App\Http\Livewire;

use App\Models\Centro;
use Livewire\Component;
use WireUi\Traits\Actions;

class Centros extends Component
{
    use Actions;

    public function render()
    {
        return view('livewire.centros', [
            'centros' => Centro::all()
        ])
        ->extends('adminlte::page')
        ->section('content');
    }

    public function delete  ($id){
        
        // dd($id);

        $Centro = Centro::find($id);
        
        $Centro->delete();

        
        return redirect()->route('centro.index');


    }
}
