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

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // public static function sumarTotalHoras()
    // {
    //     $result = DB::select('SELECT ROUND(SUM(hora_total)/10000) AS total_suma_horas FROM horas');
        
    //     if (!empty($result)) {
    //         return $result[0]->total_suma_horas;
    //     } else {
    //         return 0;
    //     }
    // }

    public static function sumarTotalHorasPorUsuario($userId)
{
    $result = DB::select('SELECT user_id, ROUND(SUM(hora_total)/10000) AS total_suma_horas FROM horas WHERE user_id = ? GROUP BY user_id', [$userId]);
    // $result = DB::select('SELECT user_id, ROUND(SUM(hora_total)) AS total_suma_horas FROM horas WHERE user_id = ? GROUP BY user_id', [$userId]);
    
    if (!empty($result)) {
        return $result[0]->total_suma_horas;
    } else {
        return 0;
    }
}

}
