<!-- app/Views/users/index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="shortcut icon" href="<?= base_url('img/logoicono.ico') ?>" />    
    
    <title>Recibos</title>
    
</head>
<body class="container mt-4">

<h2>Usuarios

<a href="<?= url_to('descargar') ?>" class="btn btn-secondary">Volver</a>
</h2>

<form method="get" class="mb-3">
    <input type="text" name="q" class="form-control" placeholder="Buscar por CUIL del usuario...">
</form>

<!--<a href="/users/create" class="btn btn-primary mb-3">Nuevo usuario</a>-->

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>CUIL</th>
            <th>Email</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user->id ?></td>
            <td><?= $user->username ?></td>
            <td><?= $user->getEmail() ?></td>
            <td>
                <?= $user->active ? '<span class="badge bg-success">Sí</span>' : '<span class="badge bg-danger">No</span>' ?>
            </td>
            <td>
                <a href="users/edit/<?= $user->id ?>" class="btn btn-warning btn-sm">Editar</a>
                <!--<a href="/users/delete/<?= $user->id ?>" class="btn btn-danger btn-sm">Eliminar</a>-->
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $pager->links() ?>

</body>
</html>