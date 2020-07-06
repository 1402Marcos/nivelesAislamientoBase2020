<?php
include_once'conexion.php';
$ver=$connect->query("SELECT COUNT(id)as cuantos FROM save_point_vuelo");

 while($row2 = mysqli_fetch_array($ver)) {
     $validar=$row2['cuantos'];
  }

  if ($validar==0) {
  	//por si no hay puntos no borre los datos
   echo '<script>location.href="verVueloSerializable.php";</script>';
  }else{

$query=$connect->query("SELECT * FROM save_point_vuelo ORDER BY id DESC LIMIT 1 ");


     while($row = mysqli_fetch_array($query)) {
     $rollback=$row['puntos'];
        }
        //la vacio por esa informacion ya no va por la restauración de la otra
       $connect->query("DELETE FROM vuelo");
    //regresar punto de restauracion
        $connect->query("INSERT INTO vuelo(idavion,origen,destino, estado)
        SELECT idavion,origen,destino,estado FROM save_point_vuelo WHERE puntos=".$rollback);
        //fin de guardar punto de restauracion

        //borrar el punto de restauracion
         $connect->query("DELETE FROM save_point_vuelo WHERE puntos=".$rollback);

        echo '<script>location.href="verVueloSerializable.php";</script>';
     }


?>