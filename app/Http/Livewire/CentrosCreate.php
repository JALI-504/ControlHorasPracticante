<?php

namespace App\Http\Livewire;

use App\Models\Centro;
use Livewire\Component;

class CentrosCreate extends Component
{
  
    public $Centro;
    public $edit = false;
    public $nombre_centro="";

    
    protected $rules = [
        'nombre_centro' => 'required', 
    ];

    protected $messages = [
        'nombre_centro.required' => 'Este campo debe deser oblicatorio.',
       
    ];

    
    public function mount($id=null){
        if ($id != null) {
            $this->edit = true;
            
            $this->Centro = Centro::find($id);

            $this->nombre_centro= $this->Centro->nombre_centro;
           
        }

    }

    public function render()
    {
        return view('livewire.centros-create')
        ->extends('adminlte::page')
        ->section('content');

    }

    public function guardar_centro(){

        $this->validate();
        

        if ($this->edit == true) {

            $this->Centro->nombre_centro = $this->nombre_centro;
          

            $this->Centro->save();

        }else {
            $Centro = Centro::create([
                'user_id' => Auth()->user()->id,
                'nombre_centro' => $this->nombre_centro               
            ]);

        }

        return redirect()->route('centro.index');
    }

    

}
