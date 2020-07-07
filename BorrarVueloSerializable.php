
<!-- ELIMINAR VUELOS-->
<?php 
include_once('conexion.php');
if (isset($_GET['matar'])) {

	 //para que funciones tenemos que verificar si el punto cero no esta guardado
        //porq si lo esta ya tenemos la concistencia guardada
        $ver=$connect->query("SELECT * FROM save_point_vuelo WHERE puntos=0");

        if (mysqli_num_rows($ver)>0) {
           //no hacer nada porque ya esta guardada y si no guardar
        }else{
            //como le dio editar vamos a guardar la concistencia de la base has ese punto
        //por si quiere dar rollback
         $connect->query("INSERT INTO save_point_vuelo(id_vuelo,idavion,origen,destino, estado,puntos)
        SELECT idvuelo,idavion,origen,destino,'libre',0 FROM vuelo");
        //fin de guardar la concistencia de la base
        }

 
 $matar = "DELETE FROM vuelo WHERE idvuelo = '".$_GET['matar']."'";
mysqli_query($connect,$matar);
   

    echo '<script>location.href="verVueloSerializable.php";</script>';
}

 ?>
