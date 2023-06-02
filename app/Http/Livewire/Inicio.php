<?php

namespace App\Http\Livewire;

use App\Models\Carrera;
use App\Models\Centro;
use App\Models\Hora;
use App\Models\Supervisor;
use App\Models\User;
use Livewire\Component;
use Dompdf\Dompdf;
use Dompdf\Options;
use Livewire\WithFileUploads;
use PDF;


class Inicio extends Component
{

    use WithFileUploads;


    public function render()
    {
        $user = auth()->user();
        $total_hora = Hora::getTotalSumaHoras()->where('user_id', $user->id);
        $users = User::with('carrera.centro')->get(); // Obtener todos los usuarios con la relación carrera cargada


        //  dd($total_hora_id);


        return view(
            'livewire.inicio',
            compact('user', 'total_hora', 'users'),
            [
                'supervisors' => Supervisor::all(),
                'carreras' => Carrera::all(),
                'centros' => Centro::all(),
                'horas' => Hora::all(),
            ]
        )
            ->extends('adminlte::page')
            ->section('content');
    }



    public function generarPdf()
    {
        $view = view('livewire.pdf-generator', ['user' => auth()->user()])->render();

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($view);
        $dompdf->setPaper('letter', 'portrait');
        $dompdf->render(); 


        $output = $dompdf->output();
        $filename = 'constanciaPractica.pdf';

        // Guardar el archivo en la ubicación deseada o descargarlo directamente
        // Aquí, se guardará en la carpeta "storage" de Laravel
        file_put_contents(storage_path($filename), $output);

        // Descargar el archivo directamente
        return response()->download(storage_path($filename))->deleteFileAfterSend(true);
    }
}
