<?php

namespace App\Http\Livewire;

use App\Models\User;
use Dotenv\Validator;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Registros extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ];

    public function register()
    {
        $validatedData = $this->validate($this->rules);

        // Crear el nuevo usuario
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Redireccionar o mostrar un mensaje de éxito
        return redirect('/register');
    }

    public function render()
    {
        return view('livewire.registros')
        ->extends('adminlte::page')
        ->section('content');
    }
    }
