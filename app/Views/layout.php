<!DOCTYPE html>
<html>
<head>
    <title>Empleados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= base_url('img/logoicono.ico') ?>" />    

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">    
    <!-- Responsive una sola columna-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Exportar a XLS -->
    <!--
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">    
    -->
    <style>
        .table tbody tr:hover {
            background-color: #f8f9fa;
            transition: 0.2s;
        }
    </style>    
    <style>
        .card {border-radius: 12px;}
        .card-header {font-weight: 500;}
        .form-control:focus {box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);}
    </style>    

</head> <!-- 🔥 ESTO FALTABA -->

<body>

<!--<div class="container mt-4">-->
<div class="container-fluid mt-4 px-3">    
    <?= $this->renderSection('content') ?>
</div>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- jQuery (PRIMERO) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<!-- Responsive una sola columna -->
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

<!-- Exportar a XLS -->
<!-- DataTables Buttons -->
<!--
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
-->
<!-- Export Excel -->
<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
-->
<!-- Export PDF -->
<!--
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
-->

<script>
/*    
window.onload = function () {
    $('#tablaEmpleados').DataTable({
        responsive: true,        
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });
};
*/
</script>

<!-- Responsive una sola columna-->
<script>
/*
$(document).ready(function () {
    $('#tablaEmpleados').DataTable({
        responsive: {
            details: {
                type: 'column',
                target: 0
            }
        },
        columnDefs: [
            {
                className: 'dtr-control',
                orderable: false,
                targets: 0
            }
        ],
        order: [1, 'asc'],
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });
});
*/
</script>


<?= $this->section('scripts') ?>

<script>
/*
$(function () {
    $('#tablaEmpleados').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excel',
                text: '📊 Exportar Excel',
                className: 'btn btn-success'
            },
            {
                extend: 'pdf',
                text: '📄 Exportar PDF',
                className: 'btn btn-danger'
            }
        ],
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });
});
*/
</script>

<?= $this->endSection() ?>

<script>
/* BOTONES
dom: 'Blfrtip',
        buttons: [
            {
                extend: 'excel',
                text: '📊 XLS',
                className: 'btn btn-success'
            },
            {
                extend: 'pdf',
                text: '📄 PDF',
                className: 'btn btn-danger'
            }
        ],

*/
jQuery(document).ready(function () {
    jQuery('#tablaEmpleados').DataTable({
        responsive: true,
        columnDefs: [
            { responsivePriority: 1, targets: 1 }, // Nombre
            { responsivePriority: 2, targets: -1 }, // Acciones
            { responsivePriority: 10001, targets: 2 }, // CUIL
            { responsivePriority: 10002, targets: 3 }, // Email
            { responsivePriority: 10003, targets: 4 } // Obs
        ],        
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });
});
</script>

</body>
</html>