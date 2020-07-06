<?php
session_start();

include_once'conexion.php';
$ver=$connect->query("SELECT COUNT(id)as cuantos FROM save_point_vuelo");

 while($row2 = mysqli_fetch_array($ver)) {
     $validar=$row2['cuantos'];
  }

  if ($validar==0) {
  	//No hay puntos entonces
  	$cuenta=1;
 
  }else{
  	$cuenta=$validar+1;
  }



 //guardar punto de restauracion
        $connect->query("INSERT INTO save_point_vuelo(id_vuelo,idavion,origen,destino, estado,puntos)
        SELECT idvuelo,idavion,origen,destino,'libre','$cuenta' FROM vuelo");
        //fin de guardar punto de restauracion

        echo '<script>location.href="verVueloSerializable.php";</script>';

?>