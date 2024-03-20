let table = new DataTable('#tabla', {
    language: {
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "Ningin registro encontrado",
        "info": "Mostrando página _PAGE_ de _PAGES_",
        "infoEmpty": "Sin datos",
        "infoFiltered": "(filtrado de _MAX_ total registros)",
        "search": "Buscar",
        "previous": "Anterior",
        "next": "Posterior"
    },
    dom: 'Bfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ]
});

// Swal.fire({
//     title: 'Error!',
//     text: 'Do you want to continue',
//     icon: 'error',
//     confirmButtonText: 'Cool'
// });
