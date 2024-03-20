@extends('layouts.app', ['noti' => []])

@section('content')
<div class="container mb-3">
    
    <a class="btn btn-primary mb-3" href="{{route('casos.form')}}">Agregar Caso</a>

    <table class="table table-bordered" id="tabla">
        <thead>
            <tr>
                <th>#</th>
                <th>Código caso</th>
                <th>Detalle Caso</th>                    
                <th>Descripcion</th>
                <th>Fecha inicio</th>
                {{-- <th>Acción</th> --}}
            </tr>
        </thead>
        <tbody>

            @forelse ($casos as $caso)
                <tr>
                    <td>{{$loop->index + 1}}</td>
                    <td>{{$caso->cas_codigo}}</td>
                    <td>{{$caso->cas_detalle}}</td>
                    <td>{{$caso->cas_descripcion}}</td>
                    <td>{{$caso->cas_fecha_inicio}}</td>
                    {{-- <td>
                        <button class="btn btn-primary">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td> --}}
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