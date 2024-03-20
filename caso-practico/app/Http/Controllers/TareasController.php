<?php

namespace App\Http\Controllers;

use App\Models\Caso;
use App\Models\Documento;
use App\Models\Empleado;
use App\Models\Tarea;
use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TareasController extends Controller
{
    
    public function tareas() {
        $tarea = new Tarea();

        $tareas = $tarea->obtenerTareas();

        return view('tareas.lista', compact('tareas'));
    }

    public function form(){
        $tipo = new Tipo();
        $caso = new Caso();
        $empleado = new Empleado();

        $tipo_tareas = $tipo->obtenerTipos(3);
        $casos = $caso->obtenerCasos();
        $empleados = $empleado->obtenerEmpleados();

        return view('tareas.form', compact('tipo_tareas', 'casos', 'empleados'));
    }

    public function post(Request $request) {        
        $tarea = new Tarea();
        $tarea->agregarTarea($request);

        return redirect()->route('tareas.list')->with('status', 'Se guardo la tarea con exito');
    }

    public function tareasAsignadas() {
        $tarea = new Tarea();
        $tareas = $tarea->tareasAsignadas(Auth::user()->id);

        return view('tareas.asignadas', compact('tareas'));
    }

    public function detalle($id) {

        $tarea = new Tarea();
        $tar = $tarea->detalleTarea($id);
        return view('tareas.evidencias', compact('tar'));
    }

    public function agregarEvidencias(Request $request) {        
        $documento = new Documento();
        $fechaActual = date("Y-m-d-H-i-s");


        $pathArchivo = "/evidencias/";

        if ($request->hasfile('evidencia')) {            
            foreach ($request->file('evidencia') as $file) {

                $extension = $file->getClientOriginalExtension();
                $arch = 'evidencia' . $fechaActual . '.' . $extension;

                $file->move(storage_path('app/public')  .$pathArchivo , $arch);                                          
            }
            $documento->cargarDocumento($request, '/storage' . $pathArchivo . $arch, $arch);            
        }

        return redirect()->route('tareas.asignadas')->with('status', 'Se guardo el documento con exito');

    }
}
