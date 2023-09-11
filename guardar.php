<?php
include_once('conexion.php');
$nombre      = $_REQUEST['nombre'];
$apellido 	 = $_REQUEST['apellido'];
$sql = "insert into usuarios( nombre, apellido) 
    values('$nombre','$apellido')"; 
$conexion ->query($sql);
$conexion->close();
header("location: listar.php");