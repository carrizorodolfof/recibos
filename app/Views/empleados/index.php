<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2 py-3">
        <h4 class="muni-title mb-0">Gestión de Empleados</h4>
        <div class="d-flex gap-2">
            <a href="<?= base_url('descargar') ?>" class="btn btn-outline-secondary">Volver</a>
            <a href="<?= base_url('empleados/create') ?>" class="btn btn-muni-azul">Nuevo Empleado</a>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="tablaEmpleados" class="table table-hover table-bordered align-middle w-100">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th>CUIL</th>
                        <th>Email</th>
                        <th>Obs.</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (! empty($empleados)): ?>
                    <?php foreach ($empleados as $emp): ?>
                    <tr>
                        <td></td>
                        <td><?= esc($emp['nombre']) ?></td>
                        <td><?= esc($emp['cuil']) ?></td>
                        <td><?= esc($emp['email']) ?></td>
                        <td><?= esc($emp['obsmail']) ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('empleados/edit/' . $emp['id']) ?>" class="btn btn-muni-azul btn-sm">
                                Editar
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            No hay empleados registrados.
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>