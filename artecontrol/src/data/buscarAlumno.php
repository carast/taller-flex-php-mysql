<?php
$matricula = $_POST['m'];
include_once 'conexion.php'; /*INCLUIMOS LA LIBRERÍA DE CONEXIÓN Y INSTANCIAMOS POR MEDIO DE LA FUNCION*/
$netConex = conectar ();
$resultado = mysql_query ("select curp,nombre,paterno,materno from alumnos where matricula='$matricula'");
if (mysql_affected_rows ( $netConex ) > 0)
{
	header ( "Content-type: text/xml" );
	print "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	print "<alumnos>\n";
	while ( ($row = mysql_fetch_row ( $resultado )) != false ) {
		print "<alumno>";
		print "<curp>" . $row [0] . "</curp>\n";
		print "<nombre>" . $row [1] . "</nombre>\n";
		print "<paterno>" . $row [2] . "</paterno>\n";
		print "<materno>" . $row [3] . "</materno>\n";
		print "</alumno>\n";
	}
	print "</alumnos>";

}else print "no";

?>
 