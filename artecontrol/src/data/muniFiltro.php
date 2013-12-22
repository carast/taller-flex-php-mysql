<?php
$edo = $_GET['id'];
include_once 'conexion.php';
$netConex = conectar ();
$resultado = mysql_query ("SELECT id_municipio, municipio 
	FROM municipios where estados_id=$edo",$netConex);
if (mysql_affected_rows ( $netConex ) > 0)
{
	header ( "Content-type: text/xml" );
	print "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	print "<municipios>\n";
	while ( ($row = mysql_fetch_row ( $resultado )) != false ) {
		print "<municipio>";
		print "<id_municipio>" . $row [0] . "</id_municipio>\n";
		print "<municipio_n>" . $row [1] . "</municipio_n>\n";
		print "</municipio>\n";
	}
	print "</municipios>";

}

?>
