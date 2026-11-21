<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2 py-3">
        <h4 class="muni-title mb-0">Gestión de Usuarios</h4>
        <a href="<?= url_to('descargar') ?>" class="btn btn-muni-azul btn-sm">Volver</a>
    </div>

    <div class="card-body">
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= esc(session()->getFlashdata('message')) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= esc(session()->getFlashdata('error')) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <form method="get" class="row g-2 mb-3">
            <div class="col-12 col-md-6">
                <input type="text" name="q" value="<?= esc($q ?? '') ?>" class="form-control" placeholder="Buscar por CUIL, nombre o correo electrónico...">
            </div>
            <div class="col-12 col-md-auto d-flex gap-2">
                <button type="submit" class="btn btn-muni-azul flex-fill flex-md-grow-0">Buscar</button>
                <?php if (! empty($q)): ?>
                    <a href="<?= base_url('users') ?>" class="btn btn-outline-secondary flex-fill flex-md-grow-0">Limpiar</a>
                <?php endif; ?>
            </div>
        </form>

        <!-- Vista de tabla (PC y Tablet) -->
        <div class="table-responsive d-none d-md-block">
            <table class="table table-bordered align-middle mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CUIL</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Activo</th>
                        <th style="width: 120px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (! empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= esc($user->id) ?></td>
                            <td><?= esc($user->username) ?></td>
                            <td><?= esc($user->nombre_empleado ?: '-') ?></td>
                            <td class="text-break"><?= esc($user->getEmail()) ?></td>
                            <td>
                                <?= $user->active
                                    ? '<span class="badge bg-success">Sí</span>'
                                    : '<span class="badge bg-danger">No</span>' ?>
                            </td>
                            <td>
                                <a href="<?= base_url('users/edit/' . $user->id) ?>" class="btn btn-muni-azul btn-sm w-100">Editar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">No se encontraron usuarios.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Vista de tarjetas (Celular) -->
        <div class="d-md-none">
            <?php if (! empty($users)): ?>
                <div class="d-flex flex-column gap-2">
                    <?php foreach ($users as $user): ?>
                        <div class="border rounded p-3 bg-white">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="fw-bold text-dark"><?= esc($user->nombre_empleado ?: 'Sin nombre') ?></span>
                                <?= $user->active
                                    ? '<span class="badge bg-success">Activo</span>'
                                    : '<span class="badge bg-danger">Inactivo</span>' ?>
                            </div>
                            <div class="small text-secondary mb-1">
                                CUIL: <strong><?= esc($user->username) ?></strong>
                            </div>
                            <div class="small text-muted text-break mb-2">
                                <?= esc($user->getEmail() ?: 'Sin correo registrado') ?>
                            </div>
                            <a href="<?= base_url('users/edit/' . $user->id) ?>" class="btn btn-muni-azul btn-sm w-100">Editar</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="alert alert-light border text-center text-muted mb-0 py-4">
                    No se encontraron usuarios.
                </div>
            <?php endif; ?>
        </div>

        <div class="d-flex justify-content-center">
            <?= $pager->links() ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>