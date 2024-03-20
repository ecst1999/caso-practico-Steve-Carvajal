<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/css/dataTable.css">
        <link rel="stylesheet" href="./assets/css/buttons.dataTables.min.css">
        <link rel="stylesheet" href="./assets/css/jquery.dataTables.min.css">
    </head>
    <body class="container mb-3">
        <div class="jumbotron">
            <h1 class="display-4">LegalPro!</h1>
            <p class="lead">Firma de abogados "LegalPro".</p>
            <hr class="my-4">
            <p>Sistema de gestión de casos.</p>
            <a class="btn btn-primary btn-lg" href="{{route('login')}}" role="button">Ingresa a tu cuenta</a>
        </div>
    </body>
    <script src="./assets/js/jquery-3.7.1.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/dataTable.js"></script>
    <script src="./assets/js/dataTable.buttons.min.js"></script>
    <script src="./assets/js/buttons.html5.min.js"></script>
    <script src="./assets/js/buttons.print.min.js"></script>
    <script src="./assets/js/jszip.min.js"></script>
    <script src="./assets/js/pdfmake.min.js"></script>
    <script src="./assets/js/vfs_fonts.js"></script>
    <script src="./assets/js/swal.js"></script>
    <script src="./assets/js/fun.js"></script>
</html>
