<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LegalPro</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/dataTable.css">
    <link rel="stylesheet" href="../assets/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    LegalPro
                </a>

                @if (Auth::user())
                    
                    @if ( Auth::user()->roles[0]['nombre'] == "asistente")
                        <a class="navbar-brand" href="{{ route('casos.list') }}">
                            Casos
                        </a>

                        <a class="navbar-brand" href="{{ route('calendario.detalle') }}">
                            Calendario
                        </a>

                        <a class="navbar-brand" href="{{ route('tareas.list') }}">
                            Tareas
                        </a>
                    @endif

                    @if ( Auth::user()->roles[0]['nombre'] == "cliente")
                        <a class="navbar-brand" href="{{route('casos.detalle')}}">
                            Casos
                        </a>                        
                    @endif

                    @if ( Auth::user()->roles[0]['nombre'] == "abogado")
                        <a class="navbar-brand" href="{{ route('calendario.detalle') }}">
                            Calendario
                        </a>
                        <a class="navbar-brand" href="{{route('tareas.asignadas')}}">
                            Tareas asignadas
                        </a>
                    @endif
                @endif


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

            <div class="container">

                Detalle Caso:

                <div class="card">
                    <div class="card-header">
                        <p>{{$cas->cas_detalle}}</p>
                    </div>
                    <div class="card-body">
                        @foreach ($documentos as $docu)
                            <a href="{{$docu->doc_path}}" download="" class="btn btn-outline-primary">
                                Descargar recurso: {{$docu->doc_nombre}}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            
        </main>
    </div>
</body>
<script src="../assets/js/jquery-3.7.1.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/dataTable.js"></script>
<script src="../assets/js/dataTable.buttons.min.js"></script>
<script src="../assets/js/buttons.html5.min.js"></script>
<script src="../assets/js/buttons.print.min.js"></script>
<script src="../assets/js/jszip.min.js"></script>
<script src="../assets/js/pdfmake.min.js"></script>
<script src="../assets/js/vfs_fonts.js"></script>
<script src="../assets/js/swal.js"></script>
<script src="../assets/js/fun.js"></script>
</html>
