<?php

namespace App\Http\Livewire;

use App\Models\Carrera;
use App\Models\Centro;
use App\Models\Supervisor;
use Livewire\Component;

class SupervisorCreate extends Component
{
    public $Supervisor;
    public $edit = false;

    public $nombre_sup="";
    public $telefono="";
    public $email="";
    public $centro="";
    public $carrera="";
  

    protected $rules = [
        'nombre_sup' => 'required|min:5|max:50', 
        'telefono' => 'required|numeric|min:8',
        'email' => 'required|email',
    ];

    protected $messages = [
        'nombre_sup.required' => 'Este campo debe deser oblicatorio.',
        'nombre_sup.min' => 'El nombre_sup no debe ser menor de 8 caracteres.',
        'nombre_sup.max' => 'El nombre_sup no debe de ser mayor de 50 caracteres.',

        'telefono.required' => 'Este campo debe de ser obligatorio.',
        'telefono.min' => 'El telefono no debe ser menor de 8 numeros.',
        'telefono.numeric' => 'Este campo solo acepta numeros',

        'email.required' => 'Este campo debe de ser obligatorio.',
        'email.email' => 'Agregue un @ y un dominio',

    ];

    public function mount($id=null){
        if ($id != null) {
            $this->edit = true;

            $this->Supervisor = Supervisor::find($id);

            $this->nombre_sup= $this->Supervisor->nombre_sup;
            $this->telefono=$this->Supervisor->tel;
            $this->email=$this->Supervisor->email;
        }

    }

    public function render()
    {
        return view('livewire.supervisors-create', [
            'centros' => Centro::all(),
            'carreras' => Carrera::all()
        ])
        ->extends('adminlte::page')
        ->section('content');
    }

    public function guardar_sup(){

        $this->validate();

        if ($this->edit == true) {

            $this->Supervisor->nombre_sup = $this->nombre_sup;
            $this->Supervisor->tel = $this->telefono;
            $this->Supervisor->email = $this->email;

            $this->Supervisor->save();

        }else {
            $supervisor = Supervisor::create([
                'centro_id' => $this->centro,
                'carrera_id' => $this->carrera,
                'user_id' => Auth()->user()->id,
                'nombre_sup' => $this->nombre_sup,
                'tel' => $this->telefono,
                'email' => $this->email,
            ]);
        }

        return redirect()->route('sup.index');
    }


}


