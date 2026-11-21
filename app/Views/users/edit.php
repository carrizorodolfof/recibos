<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-md-7 col-lg-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center py-3">
                <h5 class="muni-title mb-0">Editar Usuario</h5>
                <a href="<?= base_url('users') ?>" class="btn btn-outline-secondary btn-sm">Volver</a>
            </div>

            <div class="card-body">
                <form action="<?= base_url('users/update/' . $user->id) ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="username" class="form-label fw-semibold">CUIL / Usuario</label>
                        <input type="text" id="username" name="username" class="form-control" value="<?= esc($user->username) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Correo Electrónico</label>
                        <input type="email" id="email" name="email" class="form-control" value="<?= esc($user->getEmail()) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Nueva Contraseña</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Dejar en blanco para mantener la actual">
                            <button type="button" class="btn btn-outline-secondary" id="btnTogglePass">Mostrar</button>
                            <button type="button" class="btn btn-muni-azul" id="btnGenerarPass">Generar</button>
                        </div>
                        <div class="form-text">Por seguridad, la contraseña actual está encriptada. Ingresá una nueva solo si querés cambiarla.</div>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="active" name="active" value="1" <?= $user->active ? 'checked' : '' ?>>
                        <label class="form-check-label" for="active">
                            Usuario Activo
                        </label>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= base_url('users') ?>" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-muni-azul">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    const inputPass = document.getElementById('password');
    const btnToggle = document.getElementById('btnTogglePass');
    const btnGenerar = document.getElementById('btnGenerarPass');

    btnToggle.addEventListener('click', function () {
        if (inputPass.type === 'password') {
            inputPass.type = 'text';
            btnToggle.textContent = 'Ocultar';
        } else {
            inputPass.type = 'password';
            btnToggle.textContent = 'Mostrar';
        }
    });

    btnGenerar.addEventListener('click', function () {
        const chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789';
        let pass = '';
        for (let i = 0; i < 8; i++) {
            pass += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        inputPass.value = pass;
        inputPass.type = 'text';
        btnToggle.textContent = 'Ocultar';
    });
</script>
<?= $this->endSection() ?>