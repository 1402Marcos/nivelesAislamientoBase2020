<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
  <title>Base de datos</title>
  

 
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">


<link rel="stylesheet" type="text/css" href="librerias/font-awesome/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="librerias/materialbootstrap/materialicons.css">
<link rel="stylesheet" type="text/css" href="librerias/materialbootstrap/bootstrap-material-design.css">
<link rel="stylesheet" type="text/css" href="librerias/alertify/css/themes/default.css">
<link rel="stylesheet" type="text/css" href="librerias/alertify/css/alertify.css">
<link rel="stylesheet" type="text/css" href="librerias/alertify/alertify.min.js">

   <link rel="stylesheet" href="plugins/sweetAlert2/sweetalert2.min.css">  
      
    <link rel="stylesheet" href="plugins/animate.css/animate.css">  
	


</head>
<body>
	<?php
 include_once('barraNavegacion.php') ;
	?>

<?php

 include_once'conexion.php';
$recibir=$_GET['ir'];

 $query=$connect->query("SELECT * FROM avion WHERE idavion=".$recibir);

     while($row = mysqli_fetch_array($query)) {
     	$estado=$row['estado'];
     	$matricula=$row['matricula'];
     	$fabricante=$row['fabricante'];
     	$modelo=$row['modelo'];
     	$capacidad=$row['capacidad'];
     	$precio=$row['precio'];



     	}

$connect->query("UPDATE avion SET estado='ocupado' WHERE idavion=".$recibir);

?>

<div class="container">

	<div class="row">

		<div class="col-md-6 offset-md-3">
			<div class="card">
				<div class="card-body text-center">
					<h3>Editar registro</h3>					
				</div>
				<div class="card-body">

<?php
if ($estado=='libre') {

?>
			  <form action="" id="f1" name="f1" method="post" class="form-register" >
                    <input type="hidden" name="tirar" id="pase"/>


				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;"><b>Matricula:</b></label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="matriculaEditar" value="<?php echo $matricula;?>">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;"><b>Fabricante:</b></label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="fabricanteEditar" value="<?php echo $fabricante;?>">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;"><b>Modelo:</b></label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="modeloEditar" value="<?php echo $modelo;?>">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;"><b>Capacidad:</b></label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="capacidadEditar" value="<?php echo $capacidad;?>">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;"><b>Precio:</b></label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="precioEditar" value="<?php echo $precio;?>">
					</div>
				</div>

				<div class="modal-footer">
				<a href="liberar.php?ir=<?php echo $recibir;?>">
				<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
			    </a>
				
                <button type="submit" name="editar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Actualizar Ahora</button>

				</div>

			</form>

			<?php
		}else{
			?>
			<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;"><b></b></label>
					</div>
					
				</div>
			<?php
			sleep(10);
			echo '<script>location.href="verAvionesSerializable.php";</script>';


		   }
			?>		
				</div>
				
			</div>
        <?php
		if (isset($_REQUEST['tirar'])) {
	   include_once'conexion.php';

	    $matricula= $_REQUEST['matriculaEditar'];
	    $fabricant= $_REQUEST['fabricanteEditar'];
	    $model= $_REQUEST['modeloEditar'];
	    $capacida= $_REQUEST['capacidadEditar'];
	    $preci= $_REQUEST['precioEditar'];
	    $connect->query("UPDATE avion SET estado='libre',matricula='$matricula',fabricante='$fabricant',modelo='$model',capacidad=$capacida,precio=$preci WHERE idavion=". $recibir);


          }





        ?>

			
		</div>
		
	</div>
	
</div>



<script>
    
    jQuery(function(){

        swall({
            title: "Esta fila esta en uso",
            text: "Por favor, espere a que se libere",
            type: "success",
        },
        function(){
            window.location.href="verAvionesSerializable.php";
        })
    });
</script>


	 <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>
    <script src="js/slick.min.js"></script>

    <script src="librerias/jquery-3.2.1.min.js"></script>
    <script src="librerias/alertify/alertify.js"></script>
    <script src="librerias/alertify/alertify.min.js"></script>
    <script src="librerias/materialbootstrap/popper.js"></script>
    <script src="librerias/materialbootstrap/bootstrap-material-design.js"></script>


    <script src="plugins/sweetAlert2/sweetalert.min.js"></script>
    <script src="plugins/sweetAlert2/sweetalert2.all.min.js"></script>

 




    <script src="js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }
        });
    </script>
	
</body>
</html>