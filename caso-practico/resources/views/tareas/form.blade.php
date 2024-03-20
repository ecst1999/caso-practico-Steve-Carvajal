@extends('layouts.app', ['noti' => []])

@section('content')
<div class="container mb-3">
    
    

    <form action="{{route('tareas.post')}}" method="post" class="form-group mb-3">

        @csrf

        <label for="nombre_tarea">Nombre tarea</label>
        <input type="text" class="form-control mb-2" maxlength="60" name="nombre_tarea" id="nombre_tarea" placeholder="Nombre tarea" required>

        <label for="descripcion_tarea">Nombre tarea</label>
        <textarea name="descripcion_tarea" id="descripcion_tarea" cols="30" rows="10" required class="form-control"></textarea>

        <label for="tipo_tarea">Tipo tarea</label>
        <select name="tipo_tarea" id="tipo_tarea" class="form-control mb-2" required>
            <option value="">Seleccione</option>
            @foreach ($tipo_tareas as $tpo)
                <option value="{{$tpo->tpo_id}}">{{$tpo->tpo_nombre}}</option>
            @endforeach
        </select>

        <label for="fecha_limite">Fecha límite</label>
        <input type="date" name="fecha_limite" id="fecha_limite" class="form-control" required>

        <label for="prioridades">Prioridad</label>
        <input type="text" name="prioridades" id="prioridades" class="form-control" placeholder="Prioridad" required>

        <label for="caso_asignado">Casos</label>
        <select name="caso_asignado" id="caso_asignado" required class="form-control">
            <option value="">Seleccione</option>
            @foreach ($casos as $caso)
                <option value="{{$caso->cas_id}}">{{$caso->cas_detalle}}</option>
            @endforeach
        </select>

        <label for="empleado">Asignar persona</label>
        <select name="empleado" id="empleado" required class="form-control">
            <option value="">Seleccione</option>
            @foreach ($empleados as $empleado)
                <option value="{{$empleado->per_id}}">{{$empleado->per_nombre}} {{$empleado->per_apellido}}</option>
            @endforeach
        </select>
        

        <button class="btn btn-primary mt-3">Guardar Caso</button>
        <a class="btn btn-secondary mt-3" href="{{route('casos.list')}}">Cancelar</a>
    </form>
    

    
</div>
@endsection
