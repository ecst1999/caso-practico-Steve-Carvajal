<?php

use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\CasoController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\TipoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware('auth')->group(function(){
    //CASOS
    Route::get('/casos', [CasoController::class, 'casos'])->name('casos.list');
    Route::get('/casos-form', [CasoController::class, 'form'])->name('casos.form');
    Route::post('/casos-form', [CasoController::class, 'post'])->name('casos.post');

    Route::get('/detalle-caso', [CasoController::class, 'detalle'])->name('casos.detalle');
    Route::get('/detalle-caso/{id}', [CasoController::class, 'detalleCaso'])->name('casos.detalle.cliente');



    //CALENDARIO
    Route::get('/calendario', [CalendarioController::class, 'detalle'])->name('calendario.detalle');
    Route::get('/calendario-form', [CalendarioController::class, 'form'])->name('calendario.form');
    Route::post('/calendario-form', [CalendarioController::class, 'post'])->name('calendario.post');

    //TAREAS
    Route::get('/tareas', [TareasController::class, 'tareas'])->name('tareas.list');
    Route::get('/tareas-form', [TareasController::class, 'form'])->name('tareas.form');
    Route::post('/tareas-form', [TareasController::class, 'post'])->name('tareas.post');

    Route::get('tareas-asig', [TareasController::class, 'tareasAsignadas'])->name('tareas.asignadas');
    Route::get('tarea/{id}', [TareasController::class, 'detalle'])->name('tarea.detalle');
    Route::post('tarea-evidencias', [TareasController::class, 'agregarEvidencias'])->name('tarea.evidencias');

    //NOTIFICACIONES 
    Route::get('notificaciones', [NotificacionController::class, 'notificaciones'])->name('notificaciones.list');
    Route::get('notificacion/{id}', [NotificacionController::class, 'notificacionDetalle'])->name('notificacion.detalle');

    //TIPOS
    Route::get('tipos-form', [TipoController::class, 'form'])->name('tipos.form');
});