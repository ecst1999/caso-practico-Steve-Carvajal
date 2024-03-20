<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $table = 'tareas';

    protected $fillable = [
        'tar_nombre',
        'tar_descripcion',
        'tpo_id',
        'cas_id',
        'est_id',
        'tar_fecha_limite',
        'tar_prioridad',
    ];

    public function obtenerTareas() {
        return Tarea::join('estados', 'estados.est_id', 'tareas.est_id')
                    ->join('casos', 'casos.cas_id', 'tareas.cas_id')
                    ->join('tipos', 'tipos.tpo_id', 'tareas.tpo_id')
                    ->leftJoin('empleado_tarea', 'tareas.tar_id', 'empleado_tarea.tar_id')
                    ->leftJoin('empleados', 'empleados.emp_id', 'empleado_tarea.emp_id')
                    ->leftJoin('personas', 'personas.per_id', 'empleados.per_id')
                    ->get();
    }

    public function agregarTarea($data) {
        $tarea = Tarea::create([            
            'tar_nombre' => $data['nombre_tarea'],
            'tar_descripcion' => $data['descripcion_tarea'],
            'tpo_id' => $data['tipo_tarea'],
            'cas_id' => $data['caso_asignado'],
            'est_id' => 2,
            'tar_fecha_limite' => $data['fecha_limite'],
            'tar_prioridad' => $data['prioridades'],
        ]);

        $empleado = new EmpleadoTarea();
        return $empleado->asignarTarea($data, $tarea->id);
        
    }

    public function tareasAsignadas($usr) {
        return Persona::where('usr_id', $usr)
                    ->join('empleados', 'personas.per_id', 'empleados.per_id')
                    ->join('empleado_tarea', 'empleado_tarea.emp_id', 'empleados.emp_id')
                    ->join('tareas', 'tareas.tar_id', 'empleado_tarea.tar_id')
                    ->join('casos', 'tareas.cas_id', 'casos.cas_id')
                    ->get();
    }

    public function detalleTarea($tar) {
        return Persona::where('tareas.tar_id', $tar)
                    ->join('empleados', 'personas.per_id', 'empleados.per_id')
                    ->join('empleado_tarea', 'empleado_tarea.emp_id', 'empleados.emp_id')
                    ->join('tareas', 'tareas.tar_id', 'empleado_tarea.tar_id')
                    ->join('casos', 'tareas.cas_id', 'casos.cas_id')
                    ->first();
    }
}
