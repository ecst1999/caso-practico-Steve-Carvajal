<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;

    protected $table = 'tipos';

    protected $fillable = [        
        'tpo_nombre',
        'tpo_descripcion',
        'dettp_id',
    ];

    public function obtenerTipos($det) {
        return Tipo::where('dettp_id', $det)->get();
    }

    public function generarTipo() {
        return Tipo::create([
            
        ]);
    }
}
