<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{
    use HasFactory;

    protected $table = 'casos';

    protected $fillable = [
        'cas_detalle',
        'cas_codigo',
        'cas_descripcion',
        'cas_fecha_inicio',        
        'tpo_id',
        'est_id',
        'cli_id'
    ];

    public function obtenerCasos() {
        return Caso::get();
    }

    public function obtenerCaso($id) {
        return Caso::where('casos.cas_id', $id)
                    ->first();
    }

    public function obtenerCasoDocumentos($id) {
        return Caso::where('casos.cas_id', $id)
                    ->join('documentos', 'casos.cas_id', 'documentos.cas_id')
                    ->get();
    }

    public function guardarCaso($data, $cli) {
        return Caso::create([
            'cas_codigo' => $this->generarCodigo(),
            'cas_detalle' => $data['detalle_caso'],
            'cas_descripcion' => $data['descripcion_caso'],
            'cas_fecha_inicio' => $data['fecha_inicio'],        
            'tpo_id' => $data['tipo_caso'],
            'est_id' => 2,
            'cli_id' => $cli
        ]);
    }

    public function obtenerCasosUsr($cli) {
        return Caso::join('clientes', 'clientes.cli_id', 'casos.cli_id')
                ->join('personas', 'clientes.per_id', 'personas.per_id')
                ->join('users', 'personas.usr_id', 'users.id')
                ->where('users.id', $cli)->get();
    }

    private function generarCodigo() {        
        sleep(random_int(1, 5));
        $fechaActual = date("Y-m-d");        

        $cas = Caso::orderBy('cas_id', 'desc')->first();

        $codigo = $cas->cas_id + 1;

        return "Cas-" . $fechaActual .'-' . $codigo ;
    }
}
