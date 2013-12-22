<?php
include_once 'conexion.php';
$netConex = conectar();
$user = $_POST ['id_usuario'];
$nombre = $_POST ['nombre'];
$paterno =$_POST ['paterno'];
$materno = $_POST ['materno'];
$sexo = $_POST ['sexo'];
$matricula =$_POST ['matricula'];
$curp = $_POST ['curp'];
$fecha_nac =$_POST ['fechanac'];
$responsable =$_POST ['responsable'];
$domicilio = $_POST ['domicilio'];
$telefono = $_POST ['telefono'];
$celular = $_POST ['celular'];
$email = $_POST ['email'];
$exterior =$_POST ['exterior'];
$interior =$_POST ['interior'];
$cp = $_POST ['cp'];
$estado =$_POST ['estado'];
$municipio = $_POST ['municipio'];
$acta = $_POST ['acta'];
$comprobante =$_POST ['comprobante'];
$constancia = $_POST ['constancia'];
$foto =$_POST['foto'];
$cadena = "CALL sp_guardarAlumno ('$matricula','$curp','$nombre','$paterno','$materno','$sexo','$fecha_nac','$responsable','$telefono',
	'$celular','$email','$domicilio',$interior,$exterior,'$cp',$municipio,$estado,'$foto','$acta','$comprobante','$constancia',$user);";

echo mysql_query($cadena,$netConex) or die("No se guardo");

?>