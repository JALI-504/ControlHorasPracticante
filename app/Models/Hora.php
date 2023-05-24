<?php

namespace App\Models;

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

    public function getTotalSumaHoras()
    {
        $query = DB::table('horas')
            ->select('user_id', DB::raw("TIME_FORMAT(SEC_TO_TIME(SUM(TIME_TO_SEC(hora_total))), '%H:%i') AS total_suma_horas"))
            ->groupBy('user_id')
            ->get();

        return $query;
    }

    public function getPrimeraFechaPorUsuario()
    {
        return $this->select('user_id', DB::raw('MIN(fecha) AS primera_fecha'))
            ->groupBy('user_id')
            ->get();
    }

    public function getUltimaFechaPorUsuario()
    {
        return $this->select('user_id', DB::raw('MAX(fecha) AS ultima_fecha'))
            ->groupBy('user_id')
            ->get();
    }
}
