<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UsuariosUpdate extends Component
{

    public $User;
    public $edit = false;

    public $nombre;
    public $cuenta;
    public $telefono;
    public $email;
    public $residencia;
    public $id_user;




    public function mount($id)
    {

        $this->id_user = $id;

        $user = User::findOrFail($id);

        $this->nombre = $user->name;
        $this->cuenta = $user->cuenta;
        $this->telefono = $user->tel;
        $this->email = $user->email;
        $this->residencia = $user->residencia;

        // dd($this->email);

    }

    public function render()
    {
        return view('livewire.usuarios-update')
            ->extends('adminlte::page')
            ->section('content');
    }

    // protected $rules = [
    //     'nombre' => 'required|min:5|max:50',
    //     'cuenta' => 'required|numeric|min:11|max:11',
    //     'telefono' => 'required|numeric|min:8|max:8',
    //     'email' => 'required|email',
    //     'residencia' => 'required|min:5|max:250',
    // ];


    // protected $messages = [
    //     'nombre.required' => 'Este campo debe deser oblicatorio.',
    //     'nombre.min' => 'El nombre no debe ser menor de 8 caracteres.',
    //     'nombre.max' => 'El nombre no debe de ser mayor de 50 caracteres.',

    //     'cuenta.required' => 'Este campo debe deser oblicatorio.',
    //     'cuenta.numeric' => 'Este campo solo acepta numeros',
    //     'cuenta.min' => 'El nombre no debe ser menor de 11 caracteres.',
    //     'cuenta.max' => 'El nombre no debe de ser mayor de 11 caracteres.',

    //     'telefono.required' => 'Este campo debe de ser obligatorio.',
    //     'telefono.min' => 'El telefono no debe ser menor de 8 numeros.',
    //     'telefono.numeric' => 'Este campo solo acepta numeros',

    //     'email.required' => 'Este campo debe de ser obligatorio.',
    //     'email.email' => 'Agregue un @ y un dominio',

    //     'residencia.required' => 'Este campo debe deser oblicatorio.',
    //     'residencia.min' => 'Debe ser menor de 8 caracteres.',
    //     'residencia.max' => 'Debe de ser mayor de 250 caracteres.',

    // ];

    public function update_user()
    {

        $editUser = User::findOrFail($this->id_user);

        $editUser->name = $this->nombre;
        $editUser->cuenta = $this->cuenta;
        $editUser->tel = $this->telefono;
        $editUser->email = $this->email;
        $editUser->residencia = $this->residencia;

        $editUser->save();
        
        return redirect()->route('usuario.index');
    }

    

    
}
