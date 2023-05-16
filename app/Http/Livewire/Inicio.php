<?php

namespace App\Http\Livewire;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class Inicio extends Component
{
    public function render()
    {

        return view('livewire.inicio')
            ->extends('adminlte::page')
            ->section('content');
    }


    public function indereportx()
    {
        $users = User::all();

        // $today = Carbon::now()->format('d/m/Y');
        // $pdf = PDF::loadView('constnacias', compact('today'));
        // return $pdf->download('constancias.pdf');
    }
}
