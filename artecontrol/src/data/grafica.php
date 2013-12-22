<?php
include_once 'conexion.php';
$netConex = conectar ();
$resultado = mysql_query ("SELECT DISTINCT 
  grupo.id_grupo,
  materias.descripcion,
  COUNT(alumno_calif.matricula) AS Alumnos
FROM
 alumno_calif
 INNER JOIN grupo ON (alumno_calif.grupo_id=grupo.id_grupo)
 INNER JOIN materias ON (grupo.materia_id=materias.id_materia)
 INNER JOIN empleados ON (grupo.empleado_id=empleados.rfc)
 INNER JOIN cursos ON (materias.pertenece_curso=cursos.id_curso)
GROUP BY
  grupo.id_grupo,
  materias.descripcion
");
if (mysql_affected_rows ( $netConex ) > 0)
{
	header ( "Content-type: text/xml" );
	print "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	print "<resultados>\n";
	print "<grupos>\n";
	while ( ($row = mysql_fetch_row ( $resultado )) != false ) {
		print "<grupo name=\"".$row [1]."\">";
		print "<nombre>" . $row [1] . "</nombre>\n";
		print "<cantidad>" . $row [2] . "</cantidad>\n";
		print "</grupo>\n";
	}
		print "</grupos>\n";
	print "</resultados>";

}else print "no";

?>
 