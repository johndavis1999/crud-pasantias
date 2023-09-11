<?php
include_once('conexion.php');
if(isset($_GET['id'])){
    $conexion->query("DELETE FROM usuarios WHERE id = ".$_GET['id']);
    header("location: listar.php");
    exit();
} else {
    echo "ID no válido";
    header("location: listar.php");
}
?>
