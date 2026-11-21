<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<nav class="navbar navbar-expand-lg muni-header rounded px-3">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="<?= base_url('muni') ?>">
            <img src="<?= base_url('img/logomuni.jpg') ?>" alt="Municipalidad de Tartagal" height="45">
        </a>

        <div class="d-flex flex-wrap gap-2">
            <a class="btn btn-muni-azul btn-sm" href="#">Subir Recibos</a>
            <a class="btn btn-muni-azul btn-sm" href="<?= base_url('descargar') ?>">Descargar Recibos</a>
            <a class="btn btn-salir btn-sm" href="<?= base_url('logout') ?>">Salir</a>
        </div>
    </div>
</nav>

<?= $this->endSection() ?>