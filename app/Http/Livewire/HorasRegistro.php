<?php

namespace App\Http\Livewire;

use App\Models\Hora;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Query\Builder;

class HorasRegistro extends Component
{
    use WithPagination;
    
    public $total_horas;
    public $total;
    public $user;

    public function mount($id = null)
    {

        $this->user = User::find($id);
    }


    public function render()
    {
        $horas = Hora::query();

        if ($this->user) {
            $horas->where('user_id', $this->user->id);
        }

        $horas = $horas->orderBy('fecha', 'desc')->paginate(20);

        return view('livewire.horas-registro', compact('horas'))
            ->extends('adminlte::page')
            ->section('content');
    }


    public function delete($id)
    {

        $hora = Hora::find($id);

        $hora->delete();

        return redirect()->route('hora.registro', ['id' => $this->user->id]);
    }

    public function sumatotal()
    {
        $this->total = Hora::table('horas')
            ->sum('total_horas');
    }
}
