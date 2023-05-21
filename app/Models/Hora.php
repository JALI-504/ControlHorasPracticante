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

//     public static function sumarTotalHorasPorUsuario($userId)
// {
//     $result = DB::select('SELECT user_id, ROUND(SUM(hora_total)/10000) AS total_suma_horas FROM horas WHERE user_id = ? GROUP BY user_id', [$userId]);
    
//     if (!empty($result)) {
//         return $result[0]->total_suma_horas;
//     } else {
//         return 0;
//     }
// }

public static function getTotalHoras()
{
//     $result = DB::table('horas')
//     ->select(DB::raw('TIME_FORMAT(SEC_TO_TIME(SUM(TIME_TO_SEC(hora_total))), "%H.%i") AS total_suma_horas'))
//     ->first();

// return $result->total_suma_horas;
// }
$result = DB::select('
SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(hora_total))) AS total_suma_horas
FROM horas
WHERE user_id = horas.id
GROUP BY user_id
');

if (!empty($result)) {
return $result[0]->total_suma_horas;
} else {
return 0;
}
}

}
