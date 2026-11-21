<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-md-7 col-lg-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center py-3">
                <h5 class="muni-title mb-0">Crear Usuario</h5>
                <a href="<?= base_url('users') ?>" class="btn btn-outline-secondary btn-sm">Volver</a>
            </div>

            <div class="card-body">
                <form action="<?= base_url('users/store') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">CUIL / Usuario</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Correo Electrónico</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Contraseña</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="form-check mb-4">
                        <input type="checkbox" id="is_admin" name="is_admin" class="form-check-input">
                        <label class="form-check-label" for="is_admin">Administrador</label>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= base_url('users') ?>" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-muni-azul">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>