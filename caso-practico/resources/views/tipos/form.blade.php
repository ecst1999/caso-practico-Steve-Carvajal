@extends('layouts.app', ['noti' => []])

@section('content')
<div class="container mb-3">
    
    

    <form action="{{route('tareas.post')}}" method="post" class="form-group mb-3">

        @csrf

        <label for="nombre_tarea">Nombre tarea</label>
        <input type="text" class="form-control mb-2" maxlength="60" name="nombre_tarea" id="nombre_tarea" placeholder="Nombre tarea" required>

        
        

        <button class="btn btn-primary mt-3">Guardar tipo</button>
    </form>
    

    
</div>
@endsection
