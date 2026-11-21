<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<?php
$user   = auth()->user();
$nombre = trim($user->username);

$recibos = [];
$carpetas = [
    "archivos/2025/ABRIL 2025/",
    "archivos/2025/MAYO 2025/",
    "archivos/2025/JUNIO 2025/",
    "archivos/2025/AGUINALDO JUNIO 2025/",
    "archivos/2025/JULIO 2025/",
    "archivos/2025/AGOSTO 2025/",
    "archivos/2025/SEPTIEMBRE 2025/",
    "archivos/2025/OCTUBRE 2025/",
    "archivos/2025/NOVIEMBRE 2025/",
    "archivos/2025/AGUINALDO DICIEMBRE 2025/",
    "archivos/2025/DICIEMBRE 2025/",
    "archivos/2026/ENERO 2026/",
    "archivos/2026/FEBRERO 2026/",
    "archivos/2026/MARZO 2026/",
    "archivos/2026/ABRIL 2026/",
    "archivos/2026/MAYO 2026/",
    "archivos/2026/JUNIO 2026/",
    "archivos/2026/AGUINALDO JUNIO 2026/",
    "archivos/2026/JULIO 2026/",
    "archivos/2026/AGOSTO 2026/",
    "archivos/2026/SEPTIEMBRE 2026/",
    "archivos/2026/OCTUBRE 2026/",
    "archivos/2026/NOVIEMBRE 2026/",
    "archivos/2026/AGUINALDO DICIEMBRE 2026/",
    "archivos/2026/DICIEMBRE 2026/"
];

foreach ($carpetas as $carpeta) {
    if (is_dir($carpeta)) {
        $archivos = scandir($carpeta);
        foreach ($archivos as $archivo) {
            if ($archivo === "." || $archivo === "..") {
                continue;
            }

            $elemento     = $archivo;
            $primero_pos1 = stripos($elemento, "_");
            $str1         = substr($elemento, $primero_pos1 + 1, -1);
            $primero_pos2 = stripos($str1, "_");
            $str2         = substr($str1, $primero_pos2 + 1, -1);
            $primero_pos3 = stripos($str2, "_");
            $str3         = substr($str2, $primero_pos3 + 1, -1);
            $ultimo       = strripos($str3, "_");
            $str_ulti     = substr($str3, 0, $ultimo);

            if ($str_ulti == $nombre) {
                array_unshift($recibos, [
                    'nombre' => $archivo,
                    'url'    => base_url($carpeta . $archivo),
                ]);
            }
        }
    }
}
?>

<!-- Barra superior institucional -->
<nav class="navbar muni-header rounded px-3 mb-4">
    <div class="container-fluid d-flex flex-column flex-sm-row justify-content-between align-items-center gap-3">
        <a class="navbar-brand m-0" href="<?= base_url('descargar') ?>">
            <img src="<?= base_url('img/logomuni.jpg') ?>" alt="Municipalidad de Tartagal" class="muni-logo" height="45">
        </a>

        <div class="d-flex w-100 w-sm-auto justify-content-center justify-content-sm-end gap-2">
            <a class="btn btn-muni-azul btn-sm flex-fill flex-sm-grow-0" href="<?= site_url('perfil/cambiar-password') ?>">Cambiar Contraseña</a>
            <a class="btn btn-salir btn-sm flex-fill flex-sm-grow-0" href="<?= base_url('logout') ?>">Salir</a>
        </div>
    </div>
</nav>

<div class="row justify-content-center">
    <div class="col-12 col-lg-8">

        <!-- Panel de Administración (solo visible para admin) -->
        <?php if ($user->inGroup('admin')): ?>
            <div class="card mb-4">
                <div class="card-header py-3">
                    Panel de Administración
                </div>
                <div class="card-body d-grid d-sm-flex gap-2">
                    <a class="btn btn-muni-azul" href="<?= base_url('empleados') ?>">Gestión de Empleados</a>
                    <a class="btn btn-muni-azul" href="<?= base_url('users') ?>">Usuarios</a>
                </div>
            </div>
        <?php endif; ?>

        <!-- Listado de Recibos -->
        <div class="card">
            <div class="card-header d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center gap-1 py-3">
                <h5 class="muni-title mb-0">Mis Recibos de Sueldo</h5>
                <span class="text-muted small">CUIL: <strong><?= esc($nombre) ?></strong></span>
            </div>

            <div class="card-body">
                <?php if (! empty($recibos)): ?>
                    <div class="d-grid gap-2">
                        <?php foreach ($recibos as $recibo): ?>
                            <a class="btn btn-outline-primary btn-recibo py-2 px-3" href="<?= esc($recibo['url']) ?>" target="_blank">
                                <?= esc($recibo['nombre']) ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="alert alert-light border text-center text-muted mb-0 py-4">
                        No se encontraron recibos disponibles para tu usuario.
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>