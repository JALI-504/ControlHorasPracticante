<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Inicio extends Component
{
    public function render()
    {
        return view('home')
        ->extends('layouts.layout')
        ->section('content');    }
}



// public function indereportx()
// {
//     $users = User::all();
   
//     $today = Carbon::now()->format('d/m/Y');
//     $pdf = PDF::loadView('constnacias', compact('today'));
//     return $pdf->download('constancias.pdf');
// }
  

