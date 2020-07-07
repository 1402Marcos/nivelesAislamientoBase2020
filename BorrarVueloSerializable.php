
<!-- ELIMINAR VUELOS-->
<?php 
include_once('conexion.php');
if (isset($_GET['matar'])) {
 
 $matar = "DELETE FROM vuelo WHERE idvuelo = '".$_GET['matar']."'";
mysqli_query($connect,$matar);
   

    echo '<script>location.href="verVueloSerializable.php";</script>';
}

 ?>
