<?php

namespace App\Http\Livewire;

use App\Models\Carrera;
use Livewire\Component;
use App\Models\User;

class UsuariosCreate extends Component
 {
    public $user;
    public $edit = false;

    public $name = "";
    public $cuenta = "";
    public $telefono = "";
    public $email = "";
    public $residencia = "";
    public $password = "";
    public $carrera = "";
    public $horas_requeridas = "";

    protected function rules()
    {
        return [
            'name' => 'required|min:5|max:50',
            'cuenta' => 'required|numeric',
            'telefono' => 'required|numeric|min:20000000|max:999999999',
            'email' => 'required|email',
            'residencia' => 'required|min:5|max:250',
            'horas_requeridas' => 'required',
            'password' => $this->edit ? '' : 'required|min:8',
        ];
    }

    protected $messages = [
        'name.required' => 'Este campo debe deser oblicatorio.',
        'name.min' => 'El name no debe ser menor de 8 caracteres.',
        'name.max' => 'El name no debe de ser mayor de 50 caracteres.',

        'cuenta.required' => 'Este campo debe deser oblicatorio.',
        'cuenta.numeric' => 'Este campo solo acepta numeros',
        // 'cuenta.min' => 'El name no debe ser menor de 11 caracteres.',
        // 'cuenta.max' => 'El name no debe de ser mayor de 11 caracteres.',

        'telefono.required' => 'Este campo debe de ser obligatorio.',
        'telefono.min' => 'El telefono no debe ser menor de 8 numeros.',
        'telefono.numeric' => 'Este campo solo acepta numeros',

        'email.required' => 'Este campo debe de ser obligatorio.',
        'email.email' => 'Agregue un @ y un dominio',

        'residencia.required' => 'Este campo debe deser oblicatorio.',
        'residencia.min' => 'Debe ser menor de 8 caracteres.',
        'residencia.max' => 'Debe de ser mayor de 250 caracteres.',

        'horas_requeridas.required' => 'Este campo debe deser oblicatorio.',
        
    ];


    public function mount($id = null)
    {
        if ($id != null) {
            $this->edit = true;

            $this->user = User::find($id);

            $this->name = $this->user->name;
            $this->cuenta = $this->user->cuenta;
            $this->telefono = $this->user->tel;
            $this->email = $this->user->email;
            $this->residencia = $this->user->residencia;
            $this->horas_requeridas = $this->user->horas_requeridas;
            $this->password = $this->user->password;
            $this->carrera = $this->user->carrera_id; // Agregar esta línea

        }
    }

   public function render()
     {
         return view('livewire.Usuarios-create', [
            // 'centros' => Centro::all(),
            'carreras' => Carrera::all()
        ])
             ->extends('adminlte::page')
             ->section('content');
    }

    public function guardar_usuario()
    {

        $this->validate();

        // $horasEnMinutos = $this->horas_requeridas * 60; // Convertir horas requeridas a minutos
        $horasEnMinutos = $this->horas_requeridas; // Sin multiplicar por 60



        if ($this->edit == true) {

            $this->user->name = $this->name;
            $this->user->cuenta = $this->cuenta;
            $this->user->tel = $this->telefono;
            $this->user->email = $this->email;
            $this->user->residencia = $this->residencia;
            $this->user->horas_requeridas = $horasEnMinutos; // Asignar las horas convertidas en minutos
            $this->user->password = bcrypt($this->password);

            $this->user->save();
        } else {
            $user= User::create([
                'name' => $this->name,
                'cuenta' => $this->cuenta,
                'tel' => $this->telefono,
                'email' => $this->email,
                'residencia' => $this->residencia,
                'horas_requeridas' => $horasEnMinutos, // Asignar las horas convertidas en minutos
                'password' => bcrypt($this->password),
                'carrera_id' => $this->carrera,
            ]);
        }
        return redirect()->route('inicio');
    }
}
