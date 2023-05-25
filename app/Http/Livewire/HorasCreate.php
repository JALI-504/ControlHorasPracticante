<?php

namespace App\Http\Livewire;

use App\Models\Hora;
use App\Models\User;
use DateInterval;
use DateTime;
use Livewire\Component;

class HorasCreate extends Component
{


    public $Hora;
    public $edit = false;
    public $fecha = "";
    public $hora_inicio = "";
    public $hora_final = "";
    public $hora_total = "";
    public $user;


    protected $rules = [
        'fecha' => 'required',
        'hora_inicio' => 'required',
        'hora_final' => 'required',
    ];

    protected $messages = [
        'fecha.required' => 'Este campo debe deser oblicatorio.',
        'hora_inicio.required' => 'Este campo debe de ser obligatorio.',
        'hora_final.required' => 'Este campo debe de ser obligatorio.',
    ];


    public function mount($id = null)
    {
        if ($id != null) {
            $this->edit = true;

            $this->Hora = Hora::find($id);


            $this->user = User::find($this->Hora->user_id);


            $this->fecha = $this->Hora->fecha;
            $this->hora_inicio = $this->Hora->hora_inicio;
            $this->hora_final = $this->Hora->hora_final;
            $this->hora_total = $this->Hora->hora_total;
        }
    }



    public function render()
    {
        return view('livewire.horas-create', [
            'user' => $this->user // Pasar la variable $user a la vista
        ])
            ->extends('adminlte::page')
            ->section('content');
    }


    public function getTotalHorasProperty()
    {
        $hora_inicio = new DateTime($this->hora_inicio);
        $hora_final = new DateTime($this->hora_final);

        if ($hora_final->format('H:i') === '12:00') {
            $interval = $hora_inicio->diff($hora_final);
            $horas = $interval->h;
            $minutos = $interval->i;
            return sprintf('%02d:%02d', $horas, $minutos);
        }

        $nueva_hora_final = $hora_final->sub(new DateInterval('PT1H'));
        $interval_actualizado = $hora_inicio->diff($nueva_hora_final);
        $horas_actualizado = $interval_actualizado->h;
        $minutos_actualizado = $interval_actualizado->i;
        return sprintf('%02d:%02d', $horas_actualizado, $minutos_actualizado);
    }


    public function guardar_hora()
    {

        $this->validate();


        if ($this->edit == true) {

            $this->Hora->user_id = Auth()->user()->id;
            $this->Hora->fecha = $this->fecha;
            $this->Hora->hora_inicio = $this->hora_inicio;
            $this->Hora->hora_final = $this->hora_final;
            $this->Hora->hora_total = $this->total_horas;


            $this->Hora->save();
        } else {
            $hora = Hora::create([
                'user_id' => Auth()->user()->id,
                'fecha' => $this->fecha,
                'hora_inicio' => $this->hora_inicio,
                'hora_final' => $this->hora_final,
                'hora_total' => $this->total_horas
            ]);
        }

        return redirect()->route('hora.registro' , ['id' => Auth()->user()->id]);
    }
}
