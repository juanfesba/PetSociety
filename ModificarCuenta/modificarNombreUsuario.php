<?php
session_start();
if ($_SESSION["id"] == -1) {
  header("location:Login.php");
}
else
{
  $servername = "198.71.225.57";
  $username = "granescala";
  $password = "Granescala.123";
  $dbname = "GE";
  $Id = $_SESSION["id"];
  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT UserName FROM Users WHERE Id_User = '".$Id."'";
  $fila = mysqli_query($conn, $sql);
  $registro = mysqli_fetch_row($fila);
  $conn->close();
}
?>

<!DOCTYPE html>
<!--Descripción: este modulo es el login, donde está la opción de ingresar usuario y contraseña, si el usuario y constraseña son válidos, ingresará.
    Autor: Maria Paula Carrero Rivas y Juan Fernando Escobar
    Fecha creación: 6 de abril 2018
    Versión: 4
 -->
<html>
<head>



<script src=js/prueba.js>

</script>



<title>Modificar Nombre de Usuario</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../lib/w3.css">
<title>Modificar Nombre de Usuario</title>
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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--==========================================================================-->
</head>
<body style="background-color: #999999;">
  
  <div class="limiter">
    <div class="container-login100">
      <div class="login100-more" style="background-image: url('imagenes1/puppy2.jpg');"></div>
      <form action="modificarNombreUsuario1.php" method="post">
      <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
        <form class="login100-form validate-form">
          <span class="login100-form-title p-b-59">
            MODIFICAR NOMBRE DE USUARIO
          </span>
          
          <div class="wrap-input100 validate-input" data-validate="Nombre de Usuario es requerido">
            <span class="label-input100">Nombre de Usuario</span>
            <input class="input100" type="text" value="<?php echo $registro[0] ?>" id="usrname" name="usrname" pattern="[a-z].{2,}" placeholder="Ej. juanfesba..." required>
            <span class="focus-input100"></span>
          </div>
          <div>
          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn" id="cambiar" name="cambiar">
                CAMBIAR
              </button>
            </div>

            <a href="index.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
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

