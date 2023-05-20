<?php

namespace App\Http\Livewire;

use App\Models\Carrera;
use App\Models\Centro;
use Livewire\Component;

class CarrerasCraete extends Component
{
    public $Carrera;
    public $edit = false;

    public $carrera="";  
    public $centro="";


    protected $rules = [
        'carrera' => 'required', 
       
    ];

    protected $messages = [
        'carrera.required' => 'Este campo debe deser oblicatorio.',
        // 'Carrera.min' => 'El Carrera no debe ser menor de 8 caracteres.',
        // 'Carrera.max' => 'El Carrera no debe de ser mayor de 50 caracteres.',
    ];

    public function mount($id=null){
        if ($id != null) {
            $this->edit = true;

            $this->Carrera = Carrera::find($id);

            $this->carrera= $this->Carrera->carrera;
           
        }

    }

    public function render()
    {
        return view('livewire.carreras-craete', [
            'centros' => Centro::all()
        ])
        ->extends('adminlte::page')
        ->section('content');
    }

    public function guardar_carrera(){

        $this->validate();

        if ($this->edit == true) {

            $this->Carrera->carrera = $this->carrera;
           

            $this->Carrera->save();

        }else {
            $carrera = Carrera::create([
                'centro_id' => $this->centro,
                // 'user_id' => Auth()->user()->id,
                'carrera' => $this->carrera,
            ]);
        }

        return redirect()->route('carrera.index');
    }


}


