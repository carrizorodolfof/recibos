<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="row justify-content-center mt-4">
    <div class="col-12 col-md-6 col-lg-5">
        <div class="card">
            <div class="card-body p-4">
                <div class="text-center mb-3">
                    <a href="<?= base_url('descargar') ?>">
                        <img src="<?= base_url('img/logomuni.jpg') ?>" alt="Municipalidad de Tartagal" height="50">
                    </a>
                </div>

                <h5 class="muni-title text-center mb-4"><?= lang('Auth.changepass') ?></h5>

                <?php if (session('error') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= esc(session('error')) ?></div>
                <?php elseif (session('errors') !== null) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php if (is_array(session('errors'))) : ?>
                            <?php foreach (session('errors') as $error) : ?>
                                <?= esc($error) ?><br>
                            <?php endforeach ?>
                        <?php else : ?>
                            <?= esc(session('errors')) ?>
                        <?php endif ?>
                    </div>
                <?php endif ?>

                <form action="<?= site_url('perfil/actualizar-password') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPasswordInput" name="password_nueva" autocomplete="new-password" placeholder="<?= lang('Auth.password') ?>" required>
                        <label for="floatingPasswordInput"><?= lang('Auth.password') ?></label>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" id="floatingPasswordConfirmInput" name="password_confirmar" autocomplete="new-password" placeholder="<?= lang('Auth.passwordConfirm') ?>" required>
                        <label for="floatingPasswordConfirmInput"><?= lang('Auth.passwordConfirm') ?></label>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-muni-azul"><?= lang('Auth.ok') ?></button>
                        <a href="<?= base_url('descargar') ?>" class="btn btn-outline-secondary"><?= lang('Auth.volver') ?></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>