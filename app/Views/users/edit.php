<!-- app/Views/users/edit.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="shortcut icon" href="<?= base_url('img/logoicono.ico') ?>" />    
    
    <title>Recibos</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Editar Usuario</h2>

<form action="<?= base_url('users/update/').$user->id ?>" method="post">
    
    <div class="mb-3">
        <label>Username</label>
        <input 
            type="text" 
            name="username" 
            class="form-control"
            value="<?= $user->username ?>" 
            >
    </div>

    <div class="mb-3">
        <label>Email</label>
        <!-- Solo lectura porque Shield lo maneja en auth_identities -->
        <input 
            type="email" 
            name="email"
            class="form-control"
            value="<?= $user->email ?>" 
            >
    </div>

    <div class="form-check mb-3">
        <input 
            type="checkbox" 
            name="active" 
            class="form-check-input"
            <?= $user->active ? 'checked' : '' ?>>
        <label class="form-check-label">Usuario activo</label>
    </div>

    <a href="<?= url_to('users') ?>" class="btn btn-secondary">Volver</a>
    <button type="submit" class="btn btn-primary">Actualizar</button>

</form>

</body>
</html>