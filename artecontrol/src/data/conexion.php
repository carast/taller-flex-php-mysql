<?php
/**
 * por Carlos Z.O.
 * para CURSO TALLER MYSQL-PHP-FLEX FEBRERO 2009
 * Funcion para conectar al server y ver si el usuario exite en el servidor
 */
 function conectar(){

 if (!($link=@mysql_connect("localhost","root","")))
   {
      print "No se logro conectar al servicio";
      exit();
   }
   if (!@mysql_select_db("artes"))
   {
      print "Se conecto satisfactoriamente al servidor pero no a la base de datos, intenterlo mas tarde";
      exit();
   }
   return $link; 
 }
?>
