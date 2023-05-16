<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Perfil extends Component
{

    public $user;

    public function mount($id)
    {
        $this->user = User::find($id);
    }

    public function render()
    {
        $user = User::all();

        // dd($user);
        return view('livewire.perfil', [
            'users' => User::all()
        ])
            ->extends('adminlte::page')
            ->section('content');    
    }
    
}
