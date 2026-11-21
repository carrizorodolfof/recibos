<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<nav class="navbar muni-header rounded px-3 mb-4">
    <div class="container-fluid d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
        <a class="navbar-brand m-0" href="<?= base_url() ?>">
            <img src="<?= base_url('img/logomuni.jpg') ?>" alt="Municipalidad de Tartagal" class="muni-logo" height="45">
        </a>

        <div class="d-grid d-md-flex w-100 w-md-auto gap-2">
            <a class="btn btn-muni-azul" href="<?= base_url('login') ?>">Ingresar</a>
            <a class="btn btn-muni-azul" href="https://tartagal.gob.ar/sitio/" target="_blank">Municipalidad de Tartagal</a>
            <a class="btn btn-muni-azul" href="https://tartagal.gob.ar/sitio/wp-content/uploads/2026/03/Guia-para-Descargar-el-Recibo-de-Sueldo.pdf" target="_blank">Ayuda</a>
        </div>
    </div>
</nav>

<div class="card">
    <div class="card-body text-center py-4 py-md-5">
        <h1 class="muni-title fs-3 fs-md-1 mb-4">MUNICIPALIDAD DE TARTAGAL</h1>
        <img src="<?= base_url('img/Recibosonline.png') ?>" class="img-fluid rounded" style="max-width: 650px; width: 100%;" alt="Recibos Online">
    </div>
</div>

<?= $this->endSection() ?>