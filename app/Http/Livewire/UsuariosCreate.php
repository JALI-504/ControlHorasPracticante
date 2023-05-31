<?php

namespace App\Http\Livewire;

use App\Models\Carrera;
use App\Models\Depto;
use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;

class UsuariosCreate extends Component
{
    public $user;
    public $edit = false;
    public $isAdmin;

    use WithFileUploads;

    public $name = "";
    public $cuenta = "";
    public $telefono = "";
    public $email = "";
    public $residencia = "";
    public $password = "";
    public $carrera = null;
    public $depto = null;
    public $horas_requeridas = null;
    public $image = "";

    protected function rules()
    {
        $userId = $this->user ? $this->user->id : null;

        return [
            'name' => 'required|min:5|max:50',
            'cuenta' => 'nullable|numeric|unique:users,cuenta,' . $userId,
            'telefono' => 'required|numeric|min:20000000|max:999999999',
            'email' => 'required|email',
            'residencia' => 'required|min:5|max:250',
            'horas_requeridas' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png',
            'carrera' => 'nullable',
            'depto' => 'nullable',
            'password' => $this->edit ? '' : 'required|min:8',
        ];
    }


    protected $messages = [
        'name.required' => 'Este campo debe deser oblicatorio.',
        'name.min' => 'El name no debe ser menor de 8 caracteres.',
        'name.max' => 'El name no debe de ser mayor de 50 caracteres.',

        'telefono.required' => 'Este campo debe de ser obligatorio.',
        'telefono.min' => 'El telefono no debe ser menor de 8 numeros.',
        'telefono.numeric' => 'Este campo solo acepta numeros',

        'email.required' => 'Este campo debe de ser obligatorio.',
        'email.email' => 'Agregue un @ y un dominio',

        'residencia.required' => 'Este campo debe deser oblicatorio.',
        'residencia.min' => 'Debe ser menor de 8 caracteres.',
        'residencia.max' => 'Debe de ser mayor de 250 caracteres.',

        'imagen.image' => 'Debe seleccionar una imagen válida en formato JPEG o PNG.',
        'image' => 'nullable|image|max:1024',
        'imagen.mimes' => 'La imagen debe estar en formato JPEG o PNG.',

        'password.required' => 'Este campo es obligatorio.',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres.',

    ];


    public function mount($id = null)
    {
        if ($id != null) {
            $this->edit = true;

            $this->isAdmin = auth()->user()->hasRole('Admin');


            $this->user = User::find($id);

            $this->name = $this->user->name;
            $this->cuenta = $this->user->cuenta;
            $this->telefono = $this->user->tel;
            $this->email = $this->user->email;
            $this->residencia = $this->user->residencia;
            $this->horas_requeridas = $this->user->horas_requeridas;
            $this->password = $this->user->password;
            $this->carrera = $this->user->carrera_id ?? null;
            $this->depto = $this->user->depto_id ?? null;
        }
    }

    public function render()
    {
        return view('livewire.Usuarios-create', [
            // 'centros' => Centro::all(),
            'carreras' => Carrera::all(),
            'deptos' => Depto::all()
        ])
            ->extends('adminlte::page')
            ->section('content');
    }

    public function guardar_usuario()
    {
        $this->validate();

        $horasEnMinutos = $this->horas_requeridas ?? null;


        if ($this->edit == true) {
            $this->user->name = $this->name;
            $this->user->cuenta = $this->cuenta;
            $this->user->tel = $this->telefono;
            $this->user->email = $this->email;
            $this->user->residencia = $this->residencia;
            $this->user->horas_requeridas = $horasEnMinutos;
            $this->user->carrera_id = $this->carrera;
            $this->user->depto_id = $this->depto;
            $this->user->password = bcrypt($this->password);

            $imageName = null; // Variable para almacenar el nombre de la imagen

            if ($this->image) {
                $imageName = $this->image->store('\public\images');
                $this->user->image = $imageName; // Asignar el nombre de la imagen al campo 'image'
            }

            // dd($horasEnMinutos);

            $this->user->save();
        } else {
            $user = User::create([
                'name' => $this->name,
                'cuenta' => $this->cuenta,
                'tel' => $this->telefono,
                'email' => $this->email,
                'residencia' => $this->residencia,
                'horas_requeridas' => $horasEnMinutos,
                'image' => $this->image ? $this->image->store('\public\images') : null,
                'password' => bcrypt($this->password),
                'carrera_id' => $this->carrera,
                'depto_id' => $this->depto,
            ]);
        }

        return redirect()->route('usuario.index');
    }
}
