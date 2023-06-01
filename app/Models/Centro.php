<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'carrera_id',
        'nombre_centro',
    ];

    public function user(){
        return $this->hasMany(User::class, 'user_id', 'id');
    }

    public function carreras(){
         return $this->hasMany(Carrera::class, 'carrera_id', 'id');
    }
    
    public function supervisor(){
         return $this->belongsTo(Supervisor::class, 'carrera_id', 'id');
    }

}
