@extends('layouts.app', ['noti' => []])

@section('content')
<div class="container mb-3">
    
    

    <form action="{{route('casos.post')}}" method="post" class="form-group mb-3">

        @csrf

        <label for="nombre_cliente">Nombre cliente</label>
        <input type="text" class="form-control mb-2" maxlength="60" name="nombre_cliente" id="nombre_cliente" placeholder="Nombre cliente" required>

        <label for="apellido_cliente">Apellido cliente</label>
        <input type="text" class="form-control mb-2" maxlength="60" name="apellido_cliente" id="apellido_cliente" placeholder="Apellido cliente" required>

        <label for="identificacion_cliente">Identificación cliente</label>
        <input type="text" class="form-control mb-2" maxlength="15" name="identificacion_cliente" id="identificacion_cliente" placeholder="Identificación cliente" required>

        <label for="tipo_cliente">Tipo cliente</label>
        <select name="tipo_cliente" id="tipo_cliente" class="form-control mb-2" required>
            <option value="">Seleccione</option>
            @foreach ($tipo_clientes as $tpo)
                <option value="{{$tpo->tpo_id}}">{{$tpo->tpo_nombre}}</option>
            @endforeach
        </select>

        <label for="tipo_caso">Tipo caso</label>
        <select name="tipo_caso" id="tipo_caso" class="form-control mb-2" required>
            <option value="">Seleccione</option>
            @foreach ($tipo_casos as $tpo)
                <option value="{{$tpo->tpo_id}}">{{$tpo->tpo_nombre}}</option>
            @endforeach
        </select>


        <label for="fecha_inicio">Fecha inicio</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control mb-2" required>
        
        <label for="descripcion_caso">Descripción breve del caso</label>
        <input type="text" name="descripcion_caso" id="descripcion_caso" class="form-control" placeholder="Descripción breve" required>

        <label for="detalle_caso">Detalle del caso</label>
        <textarea name="detalle_caso" id="detalle_caso" cols="30" rows="10" class="form-control mb-2" required></textarea>


        <button class="btn btn-primary mt-3">Guardar Caso</button>
        <a class="btn btn-secondary mt-3" href="{{route('casos.list')}}">Cancelar</a>
    </form>
    

    
</div>
@endsection