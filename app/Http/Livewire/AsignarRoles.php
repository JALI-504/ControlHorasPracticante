<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;



class AsignarRoles extends Component
{
    public $user;
    public array $role_ids;
    public $user_id;

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
        // dd($id);

        if ($id != null) {
            $this->user = User::find($id);

            $this->role_ids = $this->user->roles->pluck('id')->toArray();
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

    public function asignar()
    {
        $this->validate();


        $this->role->name = $this->name;

        $role->save();

        return redirect()->route('usuario.index');
    }
}
