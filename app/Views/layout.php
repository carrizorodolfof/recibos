<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Recibos de Sueldo - Municipalidad de Tartagal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= base_url('img/logoicono.ico') ?>" />    

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">    
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

    <style>
        :root {
            --muni-verde: #157347;
            --muni-verde-oscuro: #0f5132;
            --muni-azul: #1e4e8c;
            --muni-azul-hover: #163a69;
            --muni-rojo: #c82333;
            --muni-rojo-hover: #a71d2a;
        }

        html, body {
            overflow-x: hidden;
        }

        body {
            background-color: #f8faf9;
            color: #212529;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            padding-bottom: 30px;
        }

        /* Encabezado institucional */
        .muni-header {
            background-color: #ffffff;
            border-bottom: 3px solid var(--muni-verde);
            padding: 12px 0;
            margin-bottom: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
        }

        .muni-title {
            color: var(--muni-verde);
            font-weight: 700;
            margin: 0;
        }

        /* Tarjetas */
        .card {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-top: 4px solid var(--muni-verde);
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
        }

        .card-header {
            background-color: #ffffff;
            border-bottom: 1px solid #e9ecef;
            color: var(--muni-verde-oscuro);
            font-weight: 600;
        }

        /* Botones Azul Profesional (sin íconos) */
        .btn-primary, .btn-muni-azul {
            background-color: var(--muni-azul) !important;
            border-color: var(--muni-azul) !important;
            color: #ffffff !important;
            font-weight: 500;
        }

        .btn-primary:hover, .btn-muni-azul:hover {
            background-color: var(--muni-azul-hover) !important;
            border-color: var(--muni-azul-hover) !important;
        }

        /* Botón Salir Rojo */
        .btn-salir, .btn-danger {
            background-color: var(--muni-rojo) !important;
            border-color: var(--muni-rojo) !important;
            color: #ffffff !important;
            font-weight: 500;
        }

        .btn-salir:hover, .btn-danger:hover {
            background-color: var(--muni-rojo-hover) !important;
            border-color: var(--muni-rojo-hover) !important;
        }

        /* Botón de recibo: evita desborde en celular con nombres largos */
        .btn-recibo {
            white-space: normal !important;
            word-break: break-word;
            overflow-wrap: anywhere;
            text-align: left;
            border-color: var(--muni-azul);
            color: var(--muni-azul);
            font-weight: 500;
        }

        .btn-recibo:hover {
            background-color: var(--muni-azul);
            border-color: var(--muni-azul);
            color: #ffffff;
        }

        /* Tablas */
        .table thead th {
            background-color: var(--muni-verde);
            color: #ffffff;
            font-weight: 500;
            border-color: var(--muni-verde-oscuro);
        }

        .table tbody tr:hover {
            background-color: #f1f7f4;
            transition: 0.2s;
        }

        .form-control:focus {
            border-color: var(--muni-verde);
            box-shadow: 0 0 0 0.2rem rgba(21, 115, 71, 0.2);
        }

        /* Paginador de CodeIgniter */
        ul.pagination {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin: 20px 0 0 0;
            gap: 6px;
        }

        ul.pagination li a {
            display: inline-block;
            padding: 6px 12px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            color: var(--muni-azul);
            background-color: #ffffff;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.2s;
        }

        ul.pagination li a:hover {
            background-color: #e9f0f8;
            border-color: var(--muni-azul);
        }

        ul.pagination li.active a {
            background-color: var(--muni-azul);
            color: #ffffff;
            border-color: var(--muni-azul);
            font-weight: 600;
        }

        /* Ajustes específicos para pantallas de celular */
        @media (max-width: 576px) {
            .muni-header {
                padding: 10px 0;
                margin-bottom: 16px;
            }

            .muni-logo {
                max-height: 40px;
                width: auto;
            }

            .card-body {
                padding: 1rem;
            }

            ul.pagination li a {
                padding: 5px 10px;
                font-size: 0.85rem;
            }
        }
    </style>
</head>

<body>

<div class="container-fluid mt-3 mt-md-4 px-2 px-sm-3 px-md-4">    
    <?= $this->renderSection('content') ?>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

<script>
jQuery(document).ready(function () {
    if (jQuery('#tablaEmpleados').length) {
        jQuery('#tablaEmpleados').DataTable({
            responsive: true,
            columnDefs: [
                { responsivePriority: 1, targets: 1 },
                { responsivePriority: 2, targets: -1 },
                { responsivePriority: 10001, targets: 2 },
                { responsivePriority: 10002, targets: 3 },
                { responsivePriority: 10003, targets: 4 }
            ],        
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            }
        });
    }
});
</script>

<?= $this->renderSection('scripts') ?>

</body>
</html>