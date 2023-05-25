<?php

namespace App\Http\Livewire;

use App\Models\Depto;
use Livewire\Component;

class DeptosCreate extends Component
{
    
    public $edit = false;
    
    public $depto;  
    public $nombreDepto = "";  
    public $nombreCargo = "";


    protected $rules = [
        'nombreDepto' => 'required', 
        'nombreCargo' => 'required', 
       
    ];

    protected $messages = [
        'nombreDepto.required' => 'Este campo debe deser oblicatorio.',
        'nombreCargo.required' => 'Este campo debe deser oblicatorio.',
        // 'Carrera.min' => 'El Carrera no debe ser menor de 8 caracteres.',
        // 'Carrera.max' => 'El Carrera no debe de ser mayor de 50 caracteres.',
    ];

    public function mount($id=null){
        if ($id != null) {
            $this->edit = true;

            $this->depto = Depto::find($id);

            $this->nombreDepto= $this->depto->nombreDepto;
            $this->nombreCargo= $this->depto->nombreCargo;
           
        }

    }

    public function render()
    {
        return view('livewire.deptos-create', [
            'deptos' => Depto::all()
        ])
        ->extends('adminlte::page')
        ->section('content');
    }

    public function guardar_depto(){

        $this->validate();

        if ($this->edit == true) {

            $this->depto->nombreDepto = $this->nombreDepto;
            $this->depto->nombreCargo = $this->nombreCargo;
           

            $this->depto->save();

        }else {
            $depto = Depto::create([
                'nombreDepto' => $this->nombreDepto,
                'nombreCargo' => $this->nombreCargo,
            ]);
        }

        return redirect()->route('depto.index');
    }


}


