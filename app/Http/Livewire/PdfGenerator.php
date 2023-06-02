<?php

namespace App\Http\Livewire;


use App\Models\User;
use Livewire\Component;
use Dompdf\Dompdf;
use Dompdf\Options;


class PdfGenerator extends Component
{

    
    public function generarPdf()
    {
       

        $view = view('livewire.pdf-generator')->render();
    
        $options = new Options();
        $dompdf = new Dompdf(array('enable_remote' => true));
        $dompdf = new Dompdf($options);
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
