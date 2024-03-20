<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoTarea extends Model
{
    use HasFactory;

    protected $table = 'empleado_tarea';

    protected $fillable= [
        'tar_id',
        'emp_id'
    ];

    public function asignarTarea($data, $tar) {
        return EmpleadoTarea::create([
            'tar_id' => $tar,
            'emp_id' => $data['empleado']
        ]);
    }
}
