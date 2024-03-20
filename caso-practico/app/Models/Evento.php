<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'eve_nombre',        
        'eve_descripcion',
        'eve_fecha_inicio',
        'eve_fecha_fin',
        'tpo_id',
        'usr_id',

    ];

    public function obtenerEventos($usr) {
        return Evento::where('usr_id', $usr)->get();
    }

    public function guardarEvento($data, $usr) {

        $notificacion = new Notificacione();        

        $eve = Evento::create([
            'eve_nombre' => $data['nombre_evento'],
            'eve_descripcion' => $data['descripcion'],
            'eve_fecha_inicio' => $data['fecha_evento_inicio'],            
            'tpo_id' => $data['tipo_evento'],
            'usr_id' => $usr
        ]);

        return $notificacion->generarNotificacion($data['descripcion'], $data['fecha_evento_inicio'], $data['tipo_evento'], $usr, $eve->id);
    }
}
