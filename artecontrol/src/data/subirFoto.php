<?php
$nombre=$_POST['nameFile'];
foreach ($_FILES as $fieldName => $file) {
		echo move_uploaded_file($file['tmp_name'], "../assets/pic/"  . $nombre);
	}
?>