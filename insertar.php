<?php

include_once('conexion.php');


$sql = "INSERT INTO usuarios (nombre,apellido)

VALUES('Pedro','Garcia');";



if ($conexion->query($sql) === TRUE) {

    echo "Registro ingresado correctamente.";
} else {

    echo $conexion->error;
}


$conexion->close();