<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;



class AsignarRoles extends Component
{
    public $role;

    public $edit = false;

    public $name;


    protected $rules = [
        'name' => 'required',

    ];

    protected $messages = [
        'name.required' => 'Este campo debe deser oblicatorio.',

    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->edit = true;

            $this->role = Role::find($id);

            $this->name = $this->role->name;
        }
    }


    public function render()
    {

        $roles = Role::all();

        return view('livewire.asignar-roles', [
            'roles' => Role::all(),
            'users' => User::all()
        ])
            ->extends('adminlte::page')
            ->section('content');
    }

    public function actualizar()
    {
        $this->validate();

        $role = Role::findOrFail($this->id_role);

        $role->name = $this->name;

        $role->save();

        return redirect()->route('usuario.index');
    }
}
