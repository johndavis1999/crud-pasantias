<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
<body>
<form action="actualizar.php" method="POST">
    <?php
        // Obtener el ID de la URL
        $id = $_GET['id'];

        // Realizar la consulta SQL para obtener los datos del usuario
        include_once('conexion.php');
        $sql = "SELECT nombre, apellido FROM usuarios WHERE id = $id";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
        } else {
            echo "No se encontró el usuario con el ID proporcionado.";
            exit; // Puedes personalizar este mensaje de error o redirigir al usuario.
        }
        $conexion->close();
    ?>
    <input type="hidden" class="form-control" id="exampleFormControlInput1" name="id" value="<?= $id ?>">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nombre" value="<?= $nombre ?>">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="apellido" value="<?= $nombre ?>">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">guardar</button>
    </div>
</form>
</body>
</html>