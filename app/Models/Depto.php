<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depto extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nombreDepto',
        'nombreCargo',
    ];
    
    public function user(){
        return $this->hasMany(User::class, 'user_id', 'id');
    }
    
}
