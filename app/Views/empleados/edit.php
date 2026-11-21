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

<h2>Editar Empleado</h2>

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

<form action="<?= base_url('empleados/update/').$empleado['id'] ?>" method="post">
<!--<form action="/empleados/update/<?= $empleado['id'] ?>" method="post">-->
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?= old('nombre', $empleado['nombre']) ?>" class="form-control" require>
        <!--<input type="text" name="nombre" value="<?= $empleado['nombre'] ?>" class="form-control">-->
    </div>

    <div class="mb-3">
        <label>CUIL</label>
        <!--<input type="text" name="cuil" value="<?= $empleado['cuil'] ?>" class="form-control">-->
        <input type="text" name="cuil" value="<?= old('cuil', $empleado['cuil']) ?>" class="form-control">
        </div>

    <div class="mb-3">
        <label>Email</label>
        <!--<input type="email" name="email" value="<?= $empleado['email'] ?>" class="form-control">-->
        <input type="email" name="email" value="<?= old('email', $empleado['email']) ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Observación Mail</label>
        <!--<textarea name="obsmail" class="form-control"><?= $empleado['obsmail'] ?></textarea>-->
        <textarea name="obsmail" value="<?= old('obsmail', $empleado['obsmail']) ?>" class="form-control"></textarea>
    </div>

<!--    <button class="btn btn-primary">Actualizar</button>-->
    <a href="<?= base_url('empleados') ?>" class="btn btn-secondary">
    ⬅ Volver
    </a>    
    <button class="btn btn-primary">Actualizar</button>

</form>

<!-- ********************************* -->
</div>

</div>

</div>
</div>
<!-- ********************************* -->

<?= $this->endSection() ?>