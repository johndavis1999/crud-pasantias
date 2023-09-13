<?php
include_once('conexion.php');

$id = $_REQUEST['id'];
$nombre = $_REQUEST['nombre'];
$apellido = $_REQUEST['apellido'];

// Construir la consulta de actualización
$sql = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido' WHERE id = $id";

if ($conexion->query($sql) === TRUE) {
    echo "Registro actualizado correctamente";
} else {
    echo "Error al actualizar el registro: " . $conexion->error;
}

$conexion->close();
?>
