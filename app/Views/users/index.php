<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center py-3">
        <h4 class="muni-title mb-0">Gestión de Usuarios</h4>
        <a href="<?= url_to('descargar') ?>" class="btn btn-muni-azul">Volver</a>
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
            <div class="col-md-5">
                <input type="text" name="q" value="<?= esc($q ?? '') ?>" class="form-control" placeholder="Buscar por CUIL del usuario...">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-muni-azul">Buscar</button>
                <?php if (! empty($q)): ?>
                    <a href="<?= base_url('users') ?>" class="btn btn-outline-secondary">Limpiar</a>
                <?php endif; ?>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered align-middle mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CUIL</th>
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
                            <td><?= esc($user->getEmail()) ?></td>
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
                            <td colspan="5" class="text-center text-muted py-4">No se encontraron usuarios.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            <?= $pager->links() ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>