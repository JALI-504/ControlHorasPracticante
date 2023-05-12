<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UsuariosCreate extends Component
{
    public $User;
    public $edit = false;

    public $nombre="";
    public $cuenta="";
    public $telefono="";
    public $email="";
    public $residencia="";

    public $label;
    public $placeholder;
    public $icon;
    public $rightIcon;
    public $iconSize;
  

    protected $rules = [
        'nombre' => 'required|min:5|max:50', 
        'cuenta' => 'required|numeric|min:11|max:11', 
        'telefono' => 'required|numeric|min:8|max:8',
        'email' => 'required|email',
        'residencia' => 'required|min:5|max:250',
    ];

    protected $messages = [
        'nombre.required' => 'Este campo debe deser oblicatorio.',
        'nombre.min' => 'El nombre no debe ser menor de 8 caracteres.',
        'nombre.max' => 'El nombre no debe de ser mayor de 50 caracteres.',

        'cuenta.required' => 'Este campo debe deser oblicatorio.',
        'cuenta.numeric' => 'Este campo solo acepta numeros',
        'cuenta.min' => 'El nombre no debe ser menor de 11 caracteres.',
        'cuenta.max' => 'El nombre no debe de ser mayor de 11 caracteres.',

        'telefono.required' => 'Este campo debe de ser obligatorio.',
        'telefono.min' => 'El telefono no debe ser menor de 8 numeros.',
        'telefono.numeric' => 'Este campo solo acepta numeros',

        'email.required' => 'Este campo debe de ser obligatorio.',
        'email.email' => 'Agregue un @ y un dominio',

        'residencia.required' => 'Este campo debe deser oblicatorio.',
        'residencia.min' => 'Debe ser menor de 8 caracteres.',
        'residencia.max' => 'Debe de ser mayor de 250 caracteres.',

    ];

    
    public function mount($id=null){
        if ($id != null) {
            $this->edit = true;

            $this->User = User::find($id);

            $this->nombre= $this->User->name;
            $this->cuenta= $this->User->cuenta;
            $this->telefono=$this->User->tel;
            $this->email=$this->User->email;
            $this->residencia=$this->User->residencia;
        }

    }

    public function render()
    {
        return view('livewire.usuarios-create')



        ->extends('adminlte::page')
        ->section('content');
    }

    public function guardar(){

        $this->validate();

        if ($this->edit == true) {

            $this->User->name = $this->nombre;
            $this->User->cuenta = $this->cuenta;
            $this->User->tel = $this->telefono;
            $this->User->email = $this->email;
            $this->User->residencia = $this->residencia;

            $this->User->save();

        }else {
            $Practicante = User::create([
                'name' => $this->nombre,
                'cuenta' => $this->cuenta,
                'tel' => $this->telefono,
                'email' => $this->email,
                'residencia' => $this->residencia,
            ]);
        }

        return redirect()->route('usuario.index');
    }


}

