<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracione extends Model
{
    use HasFactory;

    protected $table = 'configuraciones';

    protected $fillable = [        
        'cnf_cantidad_dias',
        'cnf_activa',
    ];

    public function obtenerCantidadDias() {
        return Configuracione::where('cnf_activa', 1)->first();
    }
}
