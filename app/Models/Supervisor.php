<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nombre_sup',
        'tel',
        'email',
        'centro_id',
        'carrera_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function centro(){
        return $this->belongsTo(Centro::class, 'centro_id', 'id');
    }
    public function carrera(){
        return $this->belongsTo(Carrera::class, 'carrera_id', 'id');
    }    
    // public function constancia(){
    //     return $this->belongsTo(constancia::class, 'constancia_id', 'id');
    // }    
}
