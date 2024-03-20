@extends('layouts.app', ['noti' => $notificaciones])

@section('content')
<div class="container mb-3">
    
    <a class="btn btn-primary mb-3" href="{{route('calendario.form')}}">Agregar evento</a>
    

    <div id='calendar'></div>

    
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

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
            
        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'es',            
            initialDate: Date.now(),                        
            eventClick: function(arg) {
                let fechaInicio = new Date(arg.event._instance.range.start);
                fechaInicio.setDate(fechaInicio.getDate() + 1);
                const fechaFin = new Date(arg.event._instance.range.end);                    
                var ddInicio = fechaInicio.getDate();
                var mmInicio = fechaInicio.getMonth() + 1;
                var ddFin = fechaFin.getDate();
                var mmFin = fechaFin.getMonth() + 1;
        
                var yyyyInicio = fechaInicio.getFullYear();
                if (ddInicio < 10) {
                    ddInicio = '0' + ddInicio;
                }
                if (mmInicio < 10) {
                    mmInicio = '0' + mmInicio;
                }
                var fechaInicioCorta = ddInicio + '/' + mmInicio + '/' + yyyyInicio;

                Swal.fire({

                    title: arg.event._def.title,
                    icon: 'info',
                    text: arg.event.extendedProps.description,
                    confirmButtonColor: '#0d6efd',
                    footer: `Fecha de evento:  ${fechaInicioCorta}` 

                })
            },                        
            eventDidMount: function(info) {
                
                var tooltip = new Tooltip(info.el, {
                    title: info.event.extendedProps.description,
                    placement: 'top',
                    trigger: 'hover',
                    container: document.getElementsByTagName('section')
                });
            },
            events: [

                @foreach ($eventos as $evento)
                    {
                        groupId: '999',
                        title: '{{$evento->eve_nombre}}',
                        description: '{{$evento->eve_descripcion}}',
                        start: '{{$evento->eve_fecha_inicio}}',
                        color: 'blue',
                    },
                @endforeach
            
            ]            
        });

        calendar.render();
    });
    </script>
@endsection

