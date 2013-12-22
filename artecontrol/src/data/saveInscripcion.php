<?php
include_once 'conexion.php';
$netConex = conectar();
$user = $_POST ['id_usuario'];
$matricula =$_POST ['matricula'];
$semestre = $_POST ['semestre'];
$curso = $_POST['curso'];
$cantidad = $_POST['cantidad'];

$cadena1 = "CALL sp_guardarInscripcion ('$semestre',$curso,'$matricula',$user);";
$cadena2= "CALL sp_guardarMovimiento (4,$cantidad,$user,'$matricula');";

mysql_query($cadena1,$netConex) or die("No se guardo");
mysql_query($cadena2,$netConex) or die("No se guardo");

?>