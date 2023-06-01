<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'carrera',
        'centro_id',
        'carrera_id',
    ];
    
    public function users(){
        return $this->hasMany(User::class, 'user_id', 'id');
    }
    public function centro(){
        return $this->belongsTo(Centro::class, 'centro_id', 'id');
    }
    public function supervisor(){
        return $this->hasOne(Supervisor::class, 'carrera_id', 'id');
    }
    
}