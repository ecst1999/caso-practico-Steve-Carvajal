<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';

    public function obtenerEmpleados() {
        return Empleado::join('personas', 'personas.per_id', 'empleados.per_id')->get();
    }

    public function asignarTarea($data, $tar) {
        return DB::table('empleado_tarea')->create([
            'tar_id' => $tar,
            'emp_id' => $data['empleado']
        ]);
    }
}


