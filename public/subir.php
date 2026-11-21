<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Archivos</title>

    <link rel="stylesheet" href="<?= ('bootstrap/css/bootstrap.min.css') ?>">
    <script src="<?= ('bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

</head>

<body>

<main>

<div class="container-fluid">
    <div class="container-fluid">
      <h1>Subir Recibos 
      <a class="btn btn-danger btn-sm" href="<?= ('logout'); ?>">SALIR</a> </h1>
    </div>
<div class="bg-light p-3 rounded">
        <div class="col-sm-12 mx-auto">
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="files">Seleccionar archivos:</label>
            <input class="btn btn-primary btn-sm" type="file" name="files[]" id="files" multiple> <!-- Aquí cambié a 'files[]' y añadí 'multiple' -->
            <br><br>
            <input class="btn btn-success btn-sm" type="submit" value="Subir archivo" name="submit">
        </form>

        </div>
        </div>
</div>
</main>
</body>

</html>


<?php
// Verifica si el formulario ha sido enviado utilizando el método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Directorio donde se guardarán los archivos subidos
    $direccion = "archivos/";

    // Extensiones permitidas para los archivos
    $extension_valida = ['pdf', 'txt', 'xlsx', 'docx'];
    
    // Tamaño máximo permitido para los archivos en bytes (5MB)
    $max_file_size = 5 * 1024 * 1024; // 5MB

    // Limita la cantidad máxima de archivos permitidos
    $max_files = 2000;

    // Cuenta la cantidad de archivos subidos
    $file_count = count($_FILES['files']['name']);

    // Verifica si la cantidad de archivos subidos excede el límite permitido
    if ($file_count > $max_files) {
        echo "Solo se permite subir un máximo de $max_files archivos al mismo tiempo.<br>";
    } else {
        // Recorre cada archivo subido por el usuario
        foreach ($_FILES['files']['name'] as $key => $filename) {
            // Genera la ruta completa donde se guardará el archivo
            $ruta = $direccion . basename($filename);
            
            // Obtiene la extensión del archivo en minúsculas
            $extension = strtolower(pathinfo($ruta, PATHINFO_EXTENSION));

            // Verifica si la extensión del archivo es válida
            if (!in_array($extension, $extension_valida)) {
                echo "(*) ERROR - Solo se permiten archivos pdf, txt y xlsx para el archivo: $filename.<br>";
            } 
            // Verifica si el tamaño del archivo no excede el límite permitido
            elseif ($_FILES["files"]["size"][$key] > $max_file_size) {
                echo "(*) ERROR - Archivo $filename es demasiado grande. El limite es de 5MB.<br>";
            } 
            // Si la extensión y el tamaño son válidos, intenta mover el archivo al directorio de destino
            else {
                if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $ruta)) {
                    // Muestra un mensaje de éxito si el archivo se subió correctamente
                    //echo "El archivo " . basename($filename) . " ha sido subido correctamente.<br>";
                    echo "(√) Archivo " . basename($filename) . "<br>";
                    } else {
                    // Muestra un mensaje de error si hubo un problema al subir el archivo
                    echo "(*) ERROR - Archivo: $filename.<br>";
                }
            }
        }
    }
}
?>