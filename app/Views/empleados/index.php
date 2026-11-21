<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card shadow-sm">
    <div class="card-body">

        <!-- HEADER -->
<!--
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">ðŸ‘¨ GestiÃ³n de Empleados

            <a href="<?= base_url('empleados/create') ?>" class="btn btn-success">
                âž• Nuevo
            </a>
            </h4>
        </div>
-->
        <div class="row mb-3 align-items-center">

        <div class="col-12 col-md-10 mb-2 mb-md-0">
            <h4 class="mb-0">👨 Gestión de Empleados
            <a href="<?= base_url('descargar') ?>" class="btn btn-secondary w-10 w-md-auto">
                ⬅ Volver
            </a>            
            <a href="<?= base_url('empleados/create') ?>" class="btn btn-success w-10 w-md-auto">
                ➕ Nuevo
            </a>
            </H4>
        </div>

    </div>        

        <!-- BUSCADOR -->
        <!--
        <form method="get" action="<?= base_url('empleados') ?>" class="d-flex justify-content-end mb-3">
            
            <div class="input-group" style="max-width: 350px;">
                <span class="input-group-text">ðŸ”Ž</span>
                <input 
                    type="text" 
                    name="buscar" 
                    value="<?= $buscar ?? '' ?>" 
                    class="form-control" 
                    placeholder="Buscar empleado...">

                <button class="btn btn-primary me-2">Buscar</button>
                <a href="<?= base_url('empleados') ?>" class="btn btn-outline-secondary">âœ–</a>
            </div>

        </form>
        -->

        <!-- TABLA -->
        <div class="table-responsive">
            <table id="tablaEmpleados" class="table table-hover table-striped table-bordered align-middle">
            <!--<table id="tablaEmpleados" class="table table-hover align-middle">-->
            <!--<table class="table table-hover align-middle">-->
                
                <thead class="table-dark">
                    <tr>
                        <!--<th>ID</th>-->
                        <th></th> <!-- Columna Control -->
                        <th>Nombre</th>
                        <th>CUIL</th>
                        <th>Email</th>
                        <th>Obs.</th>
                        
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                <?php if(!empty($empleados)): ?>
                    <?php foreach($empleados as $emp): ?>
                    <tr>

                        <td></td> <!-- Columna Control -->
                        <td><?= $emp['nombre'] ?></td>
                        <td><?= $emp['cuil'] ?></td>
                        <td><?= $emp['email'] ?></td>
                        <td><?= $emp['obsmail'] ?></td>

                        <td class="text-center">
                            <a href="<?= base_url('empleados/edit/'.$emp['id']) ?>" 
                               class="btn btn-warning btn-sm">
                               <i class="fas fa-pencil"></i>
                            </a>
<!--
                            <a href="<?= base_url('empleados/delete/'.$emp['id']) ?>" 
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Â¿Eliminar este empleado?')">
                               <i class="fas fa-times"></i>
                            </a>
                    -->
                    
                    <!-- Anulado para no poder ELIMINAR
                            <button 
                                class="btn btn-danger btn-sm"
                                onclick="confirmarEliminar(<?= $emp['id'] ?>)">
                                <i class="fas fa-times"></i>
                            </button>
                    -->
                    
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            No hay empleados registrados
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>

            </table>
        </div>

    </div>
</div>


<script>
function confirmarEliminar(id) {
    let url = "<?= base_url() ?>empleados/delete/" + id;

    Swal.fire({
        title: 'Â¿EstÃ¡s seguro?',
        text: "No podrÃ¡s revertir esto",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'SÃ­, eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}
</script>


<script>
/*    
window.onload = function () {
    $('#tablaEmpleados').DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });
};
*/
</script>

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

<!-- Responsive una sola columna -->
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

<script>
/*
jQuery(document).ready(function () {
    jQuery('#tablaEmpleados').DataTable({
        responsive: true,
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
        }
    });
});
*/

</script>

<?= $this->endSection() ?>
