<?php

namespace App\Http\Controllers;

use App\Models\Notificacione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificacionController extends Controller
{    
    public function notificaciones()
    {        
        $notificacion = new Notificacione();
        
        $notificaciones = $notificacion->obtenerNotificacionesNoVistas(Auth::user()->id);
        $notific = $notificacion->obtenerNotificaciones(Auth::user()->id);

        return view('notificaciones.listado', compact('notificaciones', 'notific'));
    }

    public function notificacionDetalle($id) {        

        $notificacion = new Notificacione();
        
        $notificaciones = $notificacion->obtenerNotificacionesNoVistas(Auth::user()->id);
        $noti = $notificacion->verNotificacion($id);

        return view('notificaciones.detalle', compact('notificaciones', 'noti'));
    }
}
