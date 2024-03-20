@extends('layouts.app', ['noti' => []])

@section('content')
<div class="container mb-3">
    
    <form action="" method="post" class="form-group mt-3">
        @csrf

        <label for="nombre_evento">Nombre evento</label>
        <input type="text" name="nombre_evento" id="nombre_evento" placeholder="Nombre evento" class="form-control mb-3" required>

        <label for="descripcion">Descripción evento</label>
        <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control mb-3" required></textarea>
        

        <label for="tipo_evento">Tipo evento</label>
        <select name="tipo_evento" id="tipo_evento" required class="form-control mb-3">
            <option value="">Seleccione</option>
            @foreach ($tipo_eventos as $tpo)
                <option value="{{$tpo->tpo_id}}">{{$tpo->tpo_nombre}}</option>
            @endforeach
        </select>        

        <label for="fecha_evento_inicio">Fecha evento</label>
        <input type="date" name="fecha_evento_inicio" id="fecha_evento_inicio" class="form-control mb-3" required>

        <button class="btn btn-primary mt-3">Guardar evento</button>
        <a class="btn btn-secondary mt-3" href="{{route('calendario.detalle')}}">Cancelar</a>

    </form>

    
</div>
@endsection
