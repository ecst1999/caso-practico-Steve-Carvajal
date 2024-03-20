<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Notificacione;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarioController extends Controller
{
    public function detalle() {
        $evento = new Evento();
        $notificacion = new Notificacione();

        $eventos = $evento->obtenerEventos(Auth::user()->id);
        $notificaciones = $notificacion->obtenerNotificacionesNoVistas(Auth::user()->id);

        return view('calendario.detalle', compact('eventos', 'notificaciones'));
    }

    public function form() {
        $tipo = new Tipo();

        $tipo_eventos = $tipo->obtenerTipos(4);

        return view('calendario.form', compact('tipo_eventos'));
    }

    public function post(Request $request) {        
        $user = $request->user()->id;        
        $evento = new Evento();
        $evento->guardarEvento($request, $user);

        return redirect()->route('calendario.detalle')->with('status', 'Se guardo el evento con exito');

    }
}
