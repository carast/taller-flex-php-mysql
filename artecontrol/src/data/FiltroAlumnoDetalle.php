<?php
$dato = $_POST['d'];
include_once 'conexion.php'; 
$netConex = conectar ();
$resultado = mysql_query ("SELECT DISTINCT 
  grupo.id_grupo,
  materias.descripcion,
  empleados.nombre,
  empleados.paterno,
  empleados.materno,
  cursos.nombre_curso,
  alumno_calif.cal_parcial,
  alumno_calif.cal_global,
  alumno_calif.cal_final,
  alumno_calif.matricula
FROM
 alumno_calif
 INNER JOIN grupo ON (alumno_calif.grupo_id=grupo.id_grupo)
 INNER JOIN materias ON (grupo.materia_id=materias.id_materia)
 INNER JOIN empleados ON (grupo.empleado_id=empleados.rfc)
 INNER JOIN cursos ON (materias.pertenece_curso=cursos.id_curso) where alumno_calif.matricula = '$dato'");
if (mysql_affected_rows ( $netConex ) > 0)
{
	header ( "Content-type: text/xml" );
	print "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	print "<alumnos>\n";
	while ( ($row = mysql_fetch_row ( $resultado )) != false ) {
		print "<alumno>";
		print "<descripcion>" . $row [1] . "</descripcion>\n";
		print "<profesor>" . $row [2] ." ".$row[3]." ".$row[4]. "</profesor>\n";
		print "<nombre_curso>" . $row [5] . "</nombre_curso>\n";
		print "<cal_parcial>" . $row [6] . "</cal_parcial>\n";
		print "<cal_global>" . $row [7] . "</cal_global>\n";
		print "<cal_final>" . $row [8] . "</cal_final>\n";
		print "</alumno>\n";
	}
	print "</alumnos>";

}else print "0";

?>
 