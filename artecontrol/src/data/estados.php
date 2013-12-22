<?php
include_once 'conexion.php'; /*INCLUIMOS LA LIBRERÍA DE CONEXIÓN Y INSTANCIAMOS POR MEDIO DE LA FUNCION*/
$netConex = conectar ();
$resultado = mysql_query ( "SELECT id_estado, estado FROM estados");
if (mysql_affected_rows ( $netConex ) > 0)
{
	header ( "Content-type: text/xml" );
	print "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	print "<estados>\n";
	while ( ($row = mysql_fetch_row ( $resultado )) != false ) {
		print "<estado>";
		print "<id_estado>" . $row [0] . "</id_estado>\n";
		print "<estado_n>" . $row [1] . "</estado_n>\n";
		print "</estado>\n";
	}
	print "</estados>";

}

?>
