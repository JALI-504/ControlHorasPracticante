<?php

namespace App\Http\Livewire;

use App\Models\Hora;
use App\Models\User;
use Livewire\Component;

class HorasRegistro extends Component
{
    public $total_horas;
    public $total;
    public $user;

    public function mount($id=null){
        
        $this->user = User::find($id);

    }

    public function render()
    {
        return view('livewire.horas-registro', [
            'horas' => Hora::when($this->user, function ($query, $value) {
                return $query->where('user_id', $this->user->id);
            }, function($query){
                return $query;
            })->get()
        ])
        ->extends('adminlte::page')
        ->section('content');
    }

    public function delete ($id){
        

        $Hora = Hora::find($id);
        
        $Hora->delete();

        return redirect()->route('hora.index');
    }

    public function sumatotal(){
        $this->total = Hora::table('horas')
        ->sum('total_horas');
    }
}