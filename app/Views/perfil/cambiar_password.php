<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?><?= lang('Auth.changepass') ?> <?= $this->endSection() ?>

<?= $this->section('main') ?>

    <div class="container d-flex justify-content-center p-5">
        <div class="card col-12 col-md-5 shadow-sm">

        <center>
        <a class="navbar-brand" href="http://localhost/recibos/public/">
          <img src="../img/logomuni.jpg" alt="Descripción de la imagen">
        </a>
        </center>

            <div class="card-body">
                <h5 class="card-title mb-3"><?= lang('Auth.changepass') ?></h5>

                <?php if (session('error') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= esc(session('error')) ?></div>
                <?php elseif (session('errors') !== null) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php if (is_array(session('errors'))) : ?>
                            <?php foreach (session('errors') as $error) : ?>
                                <?= esc($error) ?>
                                <br>
                            <?php endforeach ?>
                        <?php else : ?>
                            <?= esc(session('errors')) ?>
                        <?php endif ?>
                    </div>
                <?php endif ?>

                <form action="<?= site_url('perfil/actualizar-password') ?>" method="post">
                    <?= csrf_field() ?>

                    <!-- Password -->
                    <div class="form-floating mb-2">
                        <input type="password" class="form-control" id="floatingPasswordInput" name="password_nueva" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.password') ?>" required>
                        <label for="floatingPasswordInput"><?= lang('Auth.password') ?></label>
                    </div>

                    <!-- Password (Again) -->
                    <div class="form-floating mb-5">
                        <input type="password" class="form-control" id="floatingPasswordConfirmInput" name="password_confirmar" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.passwordConfirm') ?>" required>
                        <label for="floatingPasswordConfirmInput"><?= lang('Auth.passwordConfirm') ?></label>
                    </div>

                    <div class="d-grid col-12 col-md-8 mx-auto m-3">
                        <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.ok') ?></button>
                    </div>

                    <p class="text-center"> <a href="<?= url_to('login') ?>"><?= lang('Auth.volver') ?></a></p>

                </form>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>



<?php

/*

<h2>Cambiar contraseña</h2>

<?php if(session('error')): ?>
<p style="color:red"><?= session('error') ?></p>
<?php endif; ?>

<?php if(session('success')): ?>
<p style="color:green"><?= session('success') ?></p>
<?php endif; ?>

<form method="post" action="<?= site_url('perfil/actualizar-password') ?>">

<label>Nueva contraseña</label>
<input type="password" name="password_nueva" required>

<label>Confirmar contraseña</label>
<input type="password" name="password_confirmar" required>

<button type="submit">Cambiar contraseña</button>

</form>

*/

?>