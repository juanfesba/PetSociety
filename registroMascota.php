<?php
session_start();
if ($_SESSION["id"] == -1) {
	header("location:Login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Creación de una mascota</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('imagenes1/sam.jpeg');"></div>
			<form action="checkPet.php" method="post" enctype="multipart/form-data">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-59">
						Creación de una mascota
					</span>

				  	<div class="form-group">
	    				<span class="label-input100">Especie de animal</span>
	    				<div>
					    <select class="selectpicker" id="animaltype" name="animaltype" required>
						      <option value="" selected disabled>Escoge uno</option>
						      <option value="Perro">Perro</option>
						      <option value="Gato">Gato</option>
						      <option value="Conejo">Conejo</option>
					    </select>
				  	</div>

					<div class="wrap-input100 validate-input" data-validate="Nombre de Animal es requerido">
						<span class="label-input100">Nombre de animal</span>
						<input class="input100" type="text" pattern="[A-Za-z].{2,}" id="animalname" name="animalname" placeholder="Ej. Theo..." required>
						<span class="focus-input100"></span>
					</div>

				  	<div class="form-group">
	    				<span class="label-input100">Raza</span>
	    				<div>
					    <select class="selectpicker" id="breed" name="breed">
					    	<option value="" selected disabled>Escoge uno</option>
					    	<optgroup label="Perros">
						    	<option value="1">Akita</option>
							    <option value="2">Beagle</option>
							    <option value="3">Bulldog</option>
						    	<option value="4">Chihuahua</option>
							    <option value="5">Collie</option>
							    <option value="6">Pastor Alemán</option>
							    <option value="7">Pomerania</option>
						    	<option value="8">Sabueso</option>
							    <option value="9">Samoyedo</option>
							    <option value="10">Shiba</option>
							    <option value="11">Yorkshire Terrier</option>
							    <option value="19">Otro</option>							    
							</optgroup>
						    <optgroup label="Gatos">
						    	<option value="12">American Curl</option>
							    <option value="13">Angora</option>
							    <option value="14">Bengalí</option>
						    	<option value="15">Siamés</option>
							    <option value="16">Siberiano</option>
							    <option value="19">Otro</option>
						    </optgroup>
						    <optgroup label="Conejos">
						    	<option value="17">American</option>
							    <option value="18">Californian</option>
							    <option value="19">Otro</option>
						    </optgroup>

					    </select>
				  	</div>

					<div class="form-group">
    					<span class="label-input100">Edad</span>
    					<select class="selectpicker" id="edad" name="edad" required>
    						<option value="" selected disabled>Escoge uno</option>
					      	<option value="1">1</option>
					      	<option value="2">2</option>
					      	<option value="3">3</option>
					      	<option value="4">4</option>
					      	<option value="5">5</option>
					      	<option value="6">6</option>
					      	<option value="7">7</option>
					      	<option value="8">8</option>
					      	<option value="9">9</option>
					      	<option value="10">10</option>
					      	<option value="11">11</option>
					      	<option value="12">12</option>
					      	<option value="13">13</option>
					      	<option value="14">14</option>
					      	<option value="15">15</option>
    					</select>
  					</div>

  					<div class="form-group">
    				<span class="label-input100">Especificar Edad</span>
				    <select class="selectpicker" id="edadtipo" name="edadtipo" required>
				    	<option value="" selected disabled>Escoge uno</option>
					    <option value="1">Mes/Meses</option>
					    <option value="2">Año/Años</option>
				    </select>
				  	</div>

				  	<div class="form-group">
	    				<span class="label-input100">Tamaño</span>
	    				<div>
					    <select class="selectpicker" id="size" name="size">
					    	<option value="" selected disabled>Escoge uno</option>
						    <option value="1">Pequeño</option>
						    <option value="2">Mediano</option>
						    <option value="3">Grande</option>
					    </select>
				  	</div>
				  	<form>
						<div class="form-group" data-validate = "La descripción es requerida">
							<span class="label-input100">Descripción</span>
							<textarea class="form-control" rows ="5" id="description" name="description" 	placeholder="Escribe algo..."></textarea>
							<span class="focus-input100"></span>
						</div>
					</form>
					
						<div class="form-group">
							<span class="label-input100">Cuidados</span>
							<textarea class="form-control" rows ="5" id="cuidado" name="cuidado" placeholder="Escribe algo..."></textarea>
							<span class="focus-input100"></span>
						</div>
					
					
					<div class="form-group">
    					<span class="label-input100">Sexo</span>
	    				<select class="selectpicker" name="sexo" id="sexo">
	    					<option value="" selected disabled>Escoge uno</option>
		        			<option value="F">Hembra</option>
		        			<option value="M">Macho</option>
	    				</select>

					</div>
					
					<div>
					
					<div class="form-group">
    					<span class="label-input100">Vacunado (Sí/No)</span>
	    					<select class="selectpicker" name="vacunado" id="vacunado">
	    						<option value="" selected disabled>Escoge uno</option>
		        				<option value="1">Sí</option>
		        				<option value="0">No</option>
	    					</select>
					</div>
					

					<div>


					<div class="form-group">
    					<span class="label-input100">Estado</span>
	    					<select class="selectpicker" name="estado" id="estado">
	    						<option value="" selected disabled>Escoge uno</option>
		        				<option value="0">Adopción</option>
		        				<option value="1">Venta</option>
		        				<option value="2">Subasta</option>
	    					</select>
					</div>


					<div class="wrap-input100 validate-input" data-validate="Nombre de Animal es requerido">
						<span class="label-input100">Si escogiste Venta o Subasta pon un precio </span>
						<input class="input100" type="text" pattern="[0-9].{2,}" id="precio" name="precio" placeholder="Ej. 100000">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Nombre de Animal es requerido">
						<span class="label-input100">Si escogiste Subasta pon un tiempo (En minutos) </span>
						<input class="input100" type="text" pattern="[0-9].{1,}" id="tiempo" name="tiempo" placeholder="Ej. 30">
						<span class="focus-input100"></span>
					</div>
					<!--<form method="POST" action="#" enctype="multipart/form-data">-->
						<div class="form-group">
							<span class="label-input100">Subir imagen (opcional)</span>
							<input type="file" class="file" id="photo" name="photo" data-browse-on-zone-click="true">
						</div>
					<!--</form>-->

					<!--<form action="#" method="post" enctype="multipart/form-data">
				        <h2>Upload File</h2>
				        <label for="fileSelect">Filename:</label>
				        <input type="file" name="photo" id="fileSelect">
				        <input type="submit" name="submit" value="Upload">
				        <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
				    </form>-->



					<div></div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" id="crear">
								Crear
							</button>
						</div>

						<a href="loggedIn.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Atrás
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
			</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>