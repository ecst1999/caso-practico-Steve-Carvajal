<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';

    protected $fillable = [
        'per_nombre',
        'per_apellido',
        'per_identificacion',
        'per_celular',
        'per_correo',
        'dir_id',
        'usr_id',
    ];

    public function guardarPersona($data) {
        $persona = Persona::create([
            'per_nombre' => $data['nombre_cliente'],
            'per_apellido' => $data['apellido_cliente'],
            'per_identificacion' => $data['identificacion_cliente'],
            'usr_id' => 3,
        ]);

        $cliente = new Cliente();
        return $cliente->guardarCliente($data, $persona->id);
    }
}
