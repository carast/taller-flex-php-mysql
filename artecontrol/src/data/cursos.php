<?php
include_once 'conexion.php'; /*INCLUIMOS LA LIBRERÍA DE CONEXIÓN Y INSTANCIAMOS POR MEDIO DE LA FUNCION*/
$netConex = conectar ();
$resultado = mysql_query ("SELECT id_curso, nombre_curso FROM cursos");
if (mysql_affected_rows ( $netConex ) > 0)
{
	header ( "Content-type: text/xml" );
	print "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	print "<cursos>\n";
	while ( ($row = mysql_fetch_row ( $resultado )) != false ) {
		print "<curso>";
		print "<id_curso>" . $row [0] . "</id_curso>\n";
		print "<nombre_curso>" . $row [1] . "</nombre_curso>\n";
		print "</curso>\n";
	}
	print "</cursos>";

}

?>
