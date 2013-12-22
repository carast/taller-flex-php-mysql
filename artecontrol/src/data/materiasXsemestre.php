<?php
$curso = $_POST['c'];
$semestre = $_POST['s'];
include_once 'conexion.php'; /*INCLUIMOS LA LIBRERÍA DE CONEXIÓN Y INSTANCIAMOS POR MEDIO DE LA FUNCION*/
$netConex = conectar ();
$resultado = mysql_query ("SELECT DISTINCT 
  materias.semestre,
  materias.descripcion,
  materias.id_materia,
  cursos.id_curso
FROM
 materias
 INNER JOIN cursos ON (materias.pertenece_curso=cursos.id_curso) WHERE cursos.id_curso=$curso and materias.semestre='$semestre'");
if (mysql_affected_rows ( $netConex ) > 0)
{
	header ( "Content-type: text/xml" );
	print "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	print "<materias>\n";
	while ( ($row = mysql_fetch_row ( $resultado )) != false ) {
		print "<materia>";
		print "<semestre>" . $row [0] . "</semestre>\n";
		print "<descripcion>" . $row [1] . "</descripcion>\n";
		print "<id_materia>" . $row [2] . "</id_materia>\n";
		print "<id_curso>" . $row [3] . "</id_curso>\n";
		print "</materia>\n";
	}
	print "</materias>";

}

?>
 