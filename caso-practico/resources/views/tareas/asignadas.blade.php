@extends('layouts.app', ['noti' => []])

@section('content')
<div class="container mb-3">
    
    <a class="btn btn-primary mb-3" href="{{route('tareas.form')}}">Nueva tarea</a>

    <table class="table table-bordered" id="tabla">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre tarea</th>                    
                <th>Descripcion</th>
                <th>Caso asignado</th>
                <th>Asignado a</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($tareas as $tarea)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$tarea->tar_nombre}}</td>
                    <td>{{$tarea->tar_descripcion}}</td>
                    <td>{{$tarea->cas_detalle}}</td>
                    <td>
                        @if ($tarea->per_nombre != null)
                            {{$tarea->per_nombre . ' ' . $tarea->per_apellido . ' - ' . $tarea->emp_area}}
                        @endif   
                        @if ($tarea->per_nombre == null)
                            <strong>
                                SIN ASIGNAR TAREA
                            </strong>
                        @endif     
                    </td>
                    <td>
                        <a class="btn btn-primary" href="{{route('tarea.detalle', $tarea->tar_id)}}">Detalle</a>                        
                    </td>
                </tr>
                
            @empty
            
            @endforelse
        </tbody>
    </table>

    
</div>
@endsection

@section('scripts')
    @if (session('status'))
        <script>
            Swal.fire({
                title: 'Exito!',
                text: '{{session('status')}}',
                icon: 'info',
                confirmButtonText: 'Ok'
            });

        </script>
    @endif
@endsection