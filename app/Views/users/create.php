<!-- app/Views/users/create.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Crear Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Crear Usuario</h2>

<form action="/users/store" method="post">

    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="form-check mb-3">
        <input type="checkbox" name="is_admin" class="form-check-input">
        <label class="form-check-label">Administrador</label>
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="/users" class="btn btn-secondary">Volver</a>

</form>

</body>
</html>