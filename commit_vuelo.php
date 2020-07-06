<?php
include_once'conexion.php';
$ver=$connect->query("SELECT COUNT(id)as cuantos FROM save_point_vuelo");

 while($row2 = mysqli_fetch_array($ver)) {
     $validar=$row2['cuantos'];
  }

  if ($validar==0) {
    //por si solo ha editado sin puntos que solo recargue
   echo '<script>location.href="verVueloSerializable.php";</script>';
  }else{

        //si se queda con un punto de restauracion que borre los demas que ya 
       //no se van a ocupar
         $connect->query("DELETE FROM save_point_vuelo");

        echo '<script>location.href="verVueloSerializable.php";</script>';
     }


?>