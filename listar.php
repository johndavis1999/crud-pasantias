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

    <a href="crear.php" class="btn btn-primary">Crear</a>

    <?php
    include_once('conexion.php');
    $sql = "SELECT id,nombre,apellido
    FROM usuarios";
    $resultado = $conexion->query($sql);
    ?>
    <table class="table table-responsive">
        <thead>
            <tr>
                <th scope="col-4">#</th>
                <th scope="col-4">Nombre</th>
                <th scope="col-4">Apellido</th>
                <th scope="col-4">opciones</th>
            </tr>
        </thead>
        <tbody>
    <?php
    // validación para mostrar los datos
    if ($resultado->num_rows > 0) {

        // hay información que mostrar

        while ($row = $resultado->fetch_assoc()) {
        ?>
            <tr>
                <th scope="row"><?= $row['id'] ?></th>
                <td><?= $row['nombre'] ?></td>
                <td><?= $row['apellido'] ?></td>
                <td>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['id'] ?>">
                        eliminar <?= $row['id'] ?>
                    </button>
                    <a class=" btn btn-info" href="editar.php?id=<?= $row['id'] ?>">Editar</a>
                </td>
            </tr>
            <div class="modal fade" id="exampleModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Eliminar usuario <?= $row['nombre'] . ' ' . $row['apellido'] ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a class="btn btn-danger" href="eliminar.php?id=<?= $row['id'] ?>">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    } else {
        ?>
        <tbody>
            <tr>
                <td colspan="4">no hay bolo</td>
            </tr>
        <?php
    }
    $conexion->close();
    ?>
        </tbody>
    </table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>