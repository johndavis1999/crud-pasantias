<?php


include_once('conexion.php');


// eliminar registros

$sql = "DELETE FROM usuarios WHERE id = 2";


// validación proceso

if ($conexion->query($sql) === TRUE) {

    echo "Eliminación de registro exitosa";
} else {

    $conexion->error;
}


$conexion->close();