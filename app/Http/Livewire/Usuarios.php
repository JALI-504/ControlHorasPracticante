<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Usuarios extends Component
{
    public function render()
    {
        return view('livewire.usuarios', [
            'users' => User::where('estado' , true)->get()
        ])
            ->extends('adminlte::page')
            ->section('content');
    }

    public function estadoUser($id)
    {
        $user = User::find($id);
        if ($user->estado == true) {
            $user->estado = false;
            $user->save();
        }
        return redirect()->route('usuario.index');
    }

}
