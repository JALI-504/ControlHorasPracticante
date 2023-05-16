<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        'residencia'
    
    ];
    // public function centro(){
    //     return $this->belongsTo(Centro::class, 'user_id', 'id');
    // }

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

    public function centro(){
        return $this->belongsTo(Centro::class, 'centro_id', 'id');
    }
    // public function supervisor(){
    //     return $this->belongsTo(Supervisor::class, 'supervisor_id', 'id');
    // }
    // public function carrera(){
    //     return $this->belongsTo(Carrera::class, 'carrera_id', 'id');
    // }

    public function adminlte_profile_url(){

        return route('usuario.perfil', ['id' => $this->id]);    }
    
}
