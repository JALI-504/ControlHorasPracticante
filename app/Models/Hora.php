<?php

namespace App\Models;

use DateInterval;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hora extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fecha',
        'hora_inicio',
        'hora_final',
        'hora_total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function getTotalHoras()
    {
        $result = DB::table('horas')
        ->select(DB::raw('TIME_FORMAT(SEC_TO_TIME(SUM(TIME_TO_SEC(hora_total))), "%H.%i") AS total_suma_horas'))
        ->first();

    return $result->total_suma_horas;
    }
}
