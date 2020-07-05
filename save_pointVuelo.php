<?php
include_once'conexion.php';
 //guardar punto de restauracion
        $connect->query("INSERT INTO save_point_vuelo(id_vuelo,idavion,origen,destino, estado)
        SELECT idvuelo,idavion,origen,destino,'libre' FROM vuelo");
        //fin de guardar punto de restauracion

        echo '<script>location.href="verVueloSerializable.php";</script>';

?>