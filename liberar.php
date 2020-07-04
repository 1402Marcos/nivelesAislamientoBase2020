<?php
include_once'conexion.php';
$recibir=$_GET['ir'];

$connect->query("UPDATE avion SET estado='libre' WHERE idavion=". $recibir);
	echo '<script>location.href="verAvionesSerializable.php";</script>';

?>