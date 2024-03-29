<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     * 
     */

    protected $model = User::class;

    protected $fillable = [
        'name',
        'cuenta',
        'tel',
        'email',
        'password',
        'residencia',
        'carrera_id',
        'depto_id',
        'horas_requeridas',
        'image'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function centro()
    {
        return $this->belongsTo(Centro::class, 'centro_id', 'id');
    }

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'carrera_id', 'id');
    }

    public function depto()
    {
        return $this->belongsTo(Depto::class, 'depto_id', 'id');
    }

    public function supervisor()
    {
        return $this->belongsTo(Supervisor::class, 'supervisor_id', 'id');
    }

    public function horas()
    {
        return $this->hasMany(Hora::class, 'user_id', 'id');
    }

    public function adminlte_profile_url()
    {

        return route('usuario.perfil', ['id' => $this->id]);
    }

    public function adminlte_image(){

        return 'https://picsum.photos/300/300';
    }

    public function adminlte_desc()
    {
        $roles = $this->roles->pluck('name')->toArray();

        // Retornar los roles separados por comas
        return implode(', ', $roles);
       
    }
    
    public function totalHorasAcumuladas() {
      
        return $this->horas()->sum('hora_total');
        
    }
}
