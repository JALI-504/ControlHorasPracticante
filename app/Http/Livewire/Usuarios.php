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
        ->extends('layouts.layout')
        ->section('content');
    }

    public function delete($id){
        
        // dd($id);

        $user = User::find($id);
        
        $user->delete();

        return redirect()->route('index');
    }
}
