<?php

namespace App\Http\Livewire;

use App\Models\Carrera;
use App\Models\Centro;
use App\Models\Depto;
use App\Models\Hora;
use App\Models\Supervisor;
use App\Models\User;
use Livewire\Component;
use Dompdf\Dompdf;
use Facade\FlareClient\View;

class PdfGenerator extends Component
{

    public function generarPdf()
    {
        $view = view('livewire.pdf-generator')->render();
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);
        $dompdf->render();
        $dompdf->stream('constanciaPractica.pdf');
    }

    public function render()
    {

        $user = auth()->user();
        $user->load('depto');
        $users = User::with('carrera.centro')->get(); // Obtener todos los usuarios con la relación carrera cargada
        // dd($user->depto);

        
        return view('livewire.pdf-generator',
        compact('user', 'users'),
        [
           'User' => User::all(),
        ])
            ->extends('adminlte::page')
            ->section('content');;
    }
}
