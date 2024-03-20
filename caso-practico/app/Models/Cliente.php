<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'tpo_id',
        'per_id',
    ];

    public function guardarCliente($data, $per) {
        $cliente = Cliente::create([
            'tpo_id' => $data['tipo_cliente'],
            'per_id' => $per
        ]);

        $caso = new Caso();

        return $caso->guardarCaso($data, $cliente->id);
    }
}
