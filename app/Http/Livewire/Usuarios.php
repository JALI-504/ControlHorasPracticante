<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Usuarios extends Component
{
    public function render()
    {
        return view('livewire.usuarios', [
            'users' => User::all()
        ])
        ->extends('adminlte::page')
        ->section('content');
    }

    public function delete($id){
        
        // dd($id);

        $User = User::find($id);
        
        $User->delete();

        return redirect()->route('usuario.index');
    }
    
}
