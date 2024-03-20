<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacione extends Model
{
    use HasFactory;

    protected $table = 'notificaciones';

    protected $fillable = [                
        'not_descripcion',
        'not_fecha_max',
        'not_vista',
        'tpo_id',
        'usr_id',
        'eve_id',
    ];

    public function generarNotificacion($descripcion, $fecha_max, $tpo, $usr, $eve) {
        return Notificacione::create([
            'not_descripcion' => $descripcion,
            'not_fecha_max' => $fecha_max,
            'tpo_id' => $tpo,
            'usr_id' => $usr,
            'eve_id' => $eve
        ]);
    }

    public function obtenerNotificacionesNoVistas($usr) {
        return Notificacione::where([['notificaciones.usr_id', $usr], ['not_vista', false]])->get();
    }

    public function obtenerNotificaciones($usr){
        return Notificacione::where([['notificaciones.usr_id', $usr]])
                            ->join('tipos', 'notificaciones.tpo_id', 'tipos.tpo_id')
                            ->join('eventos', 'notificaciones.eve_id', 'eventos.eve_id')
                            ->get();
    }

    public function verNotificacion($id) {
        return Notificacione::where('not_id', $id)
                        ->join('tipos', 'notificaciones.tpo_id', 'tipos.tpo_id')
                        ->join('eventos', 'notificaciones.eve_id', 'eventos.eve_id')
                        ->first();
    }
}
