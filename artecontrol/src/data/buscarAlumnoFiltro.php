<?php
$dato = $_POST['d'];
include_once 'conexion.php'; 
$netConex = conectar ();
$resultado = mysql_query ("select matricula,curp,nombre,paterno,materno,fotografia 
from alumnos where nombre like '$dato%' or paterno like '$dato%' or materno like '$dato%' and matricula like '$dato%'");
if (mysql_affected_rows ( $netConex ) > 0)
{
	header ( "Content-type: text/xml" );
	print "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	print "<alumnos>\n";
	while ( ($row = mysql_fetch_row ( $resultado )) != false ) {
		print "<alumno>";
		print "<matricula>" . $row [0] . "</matricula>\n";
		print "<curp>" . $row [1] . "</curp>\n";
		print "<nombre>" . $row [2] . "</nombre>\n";
		print "<paterno>" . $row [3] . "</paterno>\n";
		print "<materno>" . $row [4] . "</materno>\n";
		print "<foto>" . $row [5] . "</foto>\n";
		print "</alumno>\n";
	}
	print "</alumnos>";

}else print "0";

?>
 