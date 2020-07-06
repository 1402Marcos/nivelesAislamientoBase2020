<?php
session_start();

include_once'conexion.php';
$query=$connect->query("SELECT * FROM vuelo ORDER BY idvuelo DESC LIMIT 1");

     while($row = mysqli_fetch_array($query)) {

       $row['idvuelo']=$_SESSION['idvuelo'];
      }

if (isset($_SESSION['idvuelo'])) {
    $_SESSION['idvuelo']=$_SESSION['idvuelo']+1;
    $cuenta=$_SESSION['idvuelo'];
   
}



 //guardar punto de restauracion
        $connect->query("INSERT INTO save_point_vuelo(id_vuelo,idavion,origen,destino, estado,puntos)
        SELECT idvuelo,idavion,origen,destino,'libre','$cuenta' FROM vuelo");
        //fin de guardar punto de restauracion

        echo '<script>location.href="verVueloSerializable.php";</script>';

?>