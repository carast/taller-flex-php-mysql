<?php
$user=$_POST['usuario'];
$pwd=$_POST['pwd'];
$pwd = md5($pwd);
include_once'conexion.php';
$netConex=conectar();
//$resultado=mysql_query("SELECT * FROM usuarios WHERE sesion='$user' and acceso='$pwd'", $netConex);
mysql_query("CALL sp_loggin('$user','$pwd',@s_nombre,@s_usuario,@m_nivel);", $netConex) or die("NO, verifica por favor.");
$resultado=mysql_query("select @s_nombre,@s_usuario,@m_nivel",$netConex);
$rows = mysql_fetch_row($resultado);
if($rows[0]!=null){
	header("Content-type: text/xml");
	print "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	print "<resultados>\n";
	//while (($row = mysql_fetch_row($resultado))!=false)
	//{
		print "<resultado>";	
	  	print "<id_usuario>".$rows[1]."</id_usuario>\n";
	  	print "<nombre>".$rows[0]."</nombre>\n";
	  	print "<nivel>".$rows[2]."</nivel>\n";
	 	print "</resultado>\n";
	// }
	 print "</resultados>";
}else echo "Error en el usuario o password, verifica por favor";

?>