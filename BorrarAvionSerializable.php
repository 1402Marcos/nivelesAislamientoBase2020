

<!-- ELIMINAR AVIONES-->
<?php 
include_once('conexion.php');
if (isset($_GET['matar'])) {

 
 $matar = "DELETE FROM avion WHERE idavion = '".$_GET['matar']."'";
mysqli_query($connect,$matar);
   

    echo '<script>location.href="verAvionesSerializable.php";</script>';
}

 ?>