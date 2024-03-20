<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $table = 'documentos';

    protected $fillable = [
        'doc_nombre',
        'doc_path',
        'tpo_id',
        'cas_id',
    ];

    public function cargarDocumento($data, $path, $nombreDoc) {
        return Documento::create([
            'doc_nombre' => $nombreDoc,
            'doc_path' => $path,
            'tpo_id' => 13,
            'cas_id' => $data['caso']
        ]);
    }
}
