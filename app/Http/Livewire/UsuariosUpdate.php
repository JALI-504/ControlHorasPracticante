<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UsuariosUpdate extends Component
{

    public $User;

    public $id_user;
    public $name;
    public $cuenta;
    public $tel;
    public $email;
    public $residencia;

    public function mount($id)
    {
        $this->id_user = $id;

        $user= User::findOrFail($id);
        
        $this->name=$user->name;
        $this->cuenta=$user->cuenta;
        $this->tel=$user->tel;
        $this->email=$user->email;
        $this->residencia=$user->residencia;
    }
    public function render()
    {
        return view('livewire.usuarios-update')
        ->extends('adminlte::page')
            ->section('content');;

    }

    public function actualizar()
{
    $user = User::findOrFail($this->id_user);

    // Actualizar los campos del usuario con los valores proporcionados
    $user->name = $this->name;
    $user->cuenta = $this->cuenta;
    $user->tel = $this->tel;
    $user->email = $this->email;
    $user->residencia = $this->residencia;


    // Guardar los cambios en la base de datos
    $user->save();

    // Redireccionar o mostrar un mensaje de éxito
    // Por ejemplo, puedes redireccionar a la página de visualización de usuarios:
    return redirect()->route('usuario.index');
}
}
