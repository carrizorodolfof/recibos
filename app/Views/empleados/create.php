<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!-- ********************************* -->
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-12">

        <div class="card shadow-sm">
            
            <!-- HEADER -->
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <?= isset($empleado) ? '✏️ Editar Empleado' : '➕ Nuevo Empleado' ?>
                </h5>
            </div>

            <!-- BODY -->
            <div class="card-body">
<!-- ********************************* -->

<h2>Nuevo Empleado</h2>
<!-- Error -->
<?php if(session()->get('errors')): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach(session()->get('errors') as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif; ?>

<form action="<?= base_url('empleados/store') ?>" method="post">
    <div class="mb-3">
        <label>Nombre</label>
        <!--<input type="text" name="nombre" class="form-control">-->
        <input type="text" name="nombre" value="<?= old('nombre') ?>" class="form-control" require>

    </div>

    <div class="mb-3">
        <label>CUIL</label>
        <input type="text" name="cuil" value="<?= old('cuil') ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="<?= old('email') ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Observación Mail</label>
        <textarea name="obsmail" value="<?= old('obsmail') ?>" class="form-control"></textarea>
    </div>

<!--    <button class="btn btn-success">Guardar</button>-->
    <a href="<?= base_url('empleados') ?>" class="btn btn-secondary">
    ⬅ Volver
    </a>    
    <button class="btn btn-success">Guardar</button>

    <!--<button onclick="history.back()" class="btn btn-primary">Volver</button>-->
</form>

<!-- ********************************* -->
</div>

</div>

</div>
</div>
<!-- ********************************* -->

<?= $this->endSection() ?>