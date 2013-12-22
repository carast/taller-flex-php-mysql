<?php
include_once 'conexion.php';
$netConex = conectar();
$user = $_POST ['id_usuario'];
$nombre = $_POST ['nombre'];
$cadena = "CALL sp_guardarCurso ('$nombre',$user);";
echo mysql_query($cadena,$netConex) or die("No se guardo");
?>


