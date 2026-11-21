<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center py-3">
                <h5 class="muni-title mb-0">Editar Empleado</h5>
                <a href="<?= base_url('empleados') ?>" class="btn btn-outline-secondary btn-sm">Volver</a>
            </div>

            <div class="card-body">
                <?php if (session()->get('errors')): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php foreach (session()->get('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('empleados/update/' . $empleado['id']) ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nombre</label>
                        <input type="text" name="nombre" value="<?= old('nombre', $empleado['nombre']) ?>" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">CUIL</label>
                        <input type="text" name="cuil" value="<?= old('cuil', $empleado['cuil']) ?>" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" value="<?= old('email', $empleado['email']) ?>" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Observación Mail</label>
                        <textarea name="obsmail" class="form-control" rows="3"><?= old('obsmail', $empleado['obsmail']) ?></textarea>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= base_url('empleados') ?>" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-muni-azul">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>