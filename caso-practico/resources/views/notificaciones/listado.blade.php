@extends('layouts.app', ['noti' => $notificaciones])

@section('content')
<div class="container mb-3">
    
    <h2>Notificaciones</h2>

    <table class="table table-bordered" id="tabla">
        <thead>
            <tr>
                <th>#</th>
                <th>Descripción</th>                    
                <th>Fecha</th>
                <th>Tipo</th>                
                <th>Evento</th>                
                <th>Acción</th>

            </tr>
        </thead>
        <tbody>

            @forelse ($notific as $not)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$not->not_descripcion}}</td>
                    <td>{{$not->not_fecha_max}}</td>
                    <td>{{$not->tpo_nombre}}</td>                    
                    <td>{{$not->eve_nombre}}</td>                    
                    <td>
                        <a class="btn btn-primary" href="{{route('notificacion.detalle', $not->not_id)}}">Detalle</a>                        
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