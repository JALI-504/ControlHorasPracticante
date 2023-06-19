<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UsuariosOff extends Component
{
    public function render()
    {
        return view('livewire.usuarios-off', [
            'users' => User::where('estado', false)->get()
        ])
        ->extends('adminlte::page')
        ->section('content');
    }

 
    public function delete($id){

        // dd($id);

        $user = User::find($id);       
        $user->delete();

        return redirect()->route('usuario.desactivados');
    }

    public function activarUsuario($id)
    {
        $user = User::find($id);
        $user->estado = true;
        $user->save();
        return redirect()->route('usuario.index');
    }

}
