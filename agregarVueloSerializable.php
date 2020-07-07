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

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include_once('barraNavegacion.php') ?>


<div class="container">

	<div class="row">

		<div class="col-md-6 offset-md-3">
			<div class="card">
				<div class="card-body text-center">
					<h3>Ingresar vuelo</h3>					
				</div>
				<div class="card-body">


			<form method="POST" action="agregarVueloSerializable.php">
            

				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;"><b>Avion:</b></label>
					</div>
					<div class="col-sm-9">
                    <label>Selecciones avones</label>
						<select name="avion" id="idavion" class="form-control">
                        <option value="pri">Aviones disponibles:</option>
                              <?php
                                    include_once('conexion.php');
                                    $aviones = mysqli_query($connect, "SELECT * FROM avion");
                                    while ($row = mysqli_fetch_array($aviones)) {

                                 echo '<option value='. "$row[idavion]". '> '. $row['1']. '&nbsp&nbsp&nbsp&nbsp'. $row['3']. '</option>';
                              
                               }
                                    ?> 
                      </select> 
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;"><b>Pais origen:</b></label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="origen">
					</div>
				</div>

				<div class="row form-group">
					<div class="col-sm-3">
						<label class="control-label" style="position:relative; top:7px;"><b>Pais destino:</b></label>
					</div>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="destino">
					</div>
				</div>

						
				
         
			
            <div class="modal-footer">
                <a href="vistaSerializable.php">
                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                </a>
                <button type="submit" name="agregar" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar Registro</button>
               </div>
			</form>
					
				</div>
				
			</div>


			
		</div>
		
	</div>
	
</div>





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


<?php 
include_once('conexion.php');
if (isset($_POST['agregar'])) {
    
    $avion=$_POST['avion'];
    $origen=$_POST['origen'];
    $destino=$_POST['destino'];

    mysqli_query($connect, "INSERT INTO vuelo(idavion,origen,destino)
    Values($avion,'$origen','$destino')");
   

    echo '<script>location.href="verVueloSerializable.php";</script>';
}

 ?>
