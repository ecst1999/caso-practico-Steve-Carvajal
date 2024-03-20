<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use App\Models\Persona;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CasoController extends Controller
{
    public function casos() {
        $caso = new Caso();
        $casos = $caso->obtenerCasos();

        return view('casos.lista', compact('casos'));
    }

    public function form(){
        $tipo = new Tipo();

        $tipo_clientes = $tipo->obtenerTipos(2);
        $tipo_casos = $tipo->obtenerTipos(1);


        return view('casos.form', compact('tipo_clientes', 'tipo_casos'));
    }

    public function post(Request $request) {        
        $persona = new Persona();
        $persona->guardarPersona($request);

        return redirect()->route('casos.list')->with('status', 'Se guardo el caso con exito');
    }

    public function detalle() {
        $rol = Auth::user()->roles[0]['nombre'];
        if($rol != "cliente")
            return redirect()->route('casos.list');
        $caso = new Caso();
        $casos = $caso->obtenerCasosUsr(Auth::user()->id);

        return view('casos.detalle', compact('casos'));
    }

    public function detalleCaso($id) {        
        $caso = new Caso();
        $documentos = $caso->obtenerCasoDocumentos($id);
        $cas = $caso->obtenerCaso($id);

        return view('casos.caso-evidencias', compact('documentos', 'cas'));
    }
}
