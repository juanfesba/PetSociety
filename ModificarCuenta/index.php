<?php
session_start();
if ($_SESSION["id"] == -1) {
  header("location:../Login.php");
}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Navigation Animation</title>
  
  
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <header>
  <h1>
                MODIFICACIÓN DE LA CUENTA
            </h1>
  <span>
                Escoja una opción que quiera modificar
            </span>
</header>
<div class="container blue circleBehind">
  <a onclick="location.href='modificarDatosPersonales.php'">DATOS PERSONALES</a>
  <a onclick="location.href='modificarTarjetaCredito.php'">TARJETA DE CRÉDITO</a>
  <a onclick="location.href='modificarNombreUsuario.php'">USUARIO</a>
  <a onclick="location.href='modificarContra.php'">CONTRASEÑA</a>
  <a onclick="location.href='../loggedIn.php'">ATRÁS</a>
</div>
<!--
<div class="container purple topBotomBordersIn">
  <a>HOME</a>
  <a>ARTICLES</a>
  <a>PORTFOLIO</a>
  <a>ABOUT</a>
  <a>CONTACT</a>
</div>

<div class="container indigo topLeftBorders">
  <a>HOME</a>
  <a>ARTICLES</a>
  <a>PORTFOLIO</a>
  <a>ABOUT</a>
  <a>CONTACT</a>
</div>

<div class="container red topBotomBordersOut">
  <a>HOME</a>
  <a>ARTICLES</a>
  <a>PORTFOLIO</a>
  <a>ABOUT</a>
  <a>CONTACT</a>
</div>

<div class="container cyan brackets">
  <a>HOME</a>
  <a>ARTICLES</a>
  <a>PORTFOLIO</a>
  <a>ABOUT</a>
  <a>CONTACT</a>
</div>

<div class="container teal borderYtoX">
  <a>HOME</a>
  <a>ARTICLES</a>
  <a>PORTFOLIO</a>
  <a>ABOUT</a>
  <a>CONTACT</a>
</div>

<div class="container green borderXwidth">
  <a>HOME</a>
  <a>ARTICLES</a>
  <a>PORTFOLIO</a>
  <a>ABOUT</a>
  <a>CONTACT</a>
</div>

<div class="container lightGreen pullDown">
  <a>HOME</a>
  <a>ARTICLES</a>
  <a>PORTFOLIO</a>
  <a>ABOUT</a>
  <a>CONTACT</a>
</div>

<div class="container lime pullUp">
  <a>HOME</a>
  <a>ARTICLES</a>
  <a>PORTFOLIO</a>
  <a>ABOUT</a>
  <a>CONTACT</a>
</div>

<div class="container yellow pullRight">
  <a>HOME</a>
  <a>ARTICLES</a>
  <a>PORTFOLIO</a>
  <a>ABOUT</a>
  <a>CONTACT</a>
</div>

<div class="container amber pullLeft">
  <a>HOME</a>
  <a>ARTICLES</a>
  <a>PORTFOLIO</a>
  <a>ABOUT</a>
  <a>CONTACT</a>
</div>

<div class="container orange pullUpDown">
  <a>HOME</a>
  <a>ARTICLES</a>
  <a>PORTFOLIO</a>
  <a>ABOUT</a>
  <a>CONTACT</a>
</div>

<div class="container deepOrange pullRightLeft">
  <a>HOME</a>
  <a>ARTICLES</a>
  <a>PORTFOLIO</a>
  <a>ABOUT</a>
  <a>CONTACT</a>
</div>

<div class="container brown highlightTextOut">
  <a alt="HOME">HOME</a>
  <a alt="ARTICLES">ARTICLES</a>
  <a alt="PORTFOLIO">PORTFOLIO</a>
  <a alt="ABOUT">ABOUT</a>
  <a alt="CONTACT">CONTACT</a>
</div>

<div class="container gray highlightTextIn">
  <a alt="HOME">HOME</a>
  <a alt="ARTICLES">ARTICLES</a>
  <a alt="PORTFOLIO">PORTFOLIO</a>
  <a alt="ABOUT">ABOUT</a>
  <a alt="CONTACT">CONTACT</a>
</div>
-->
<footer>
  <span>Softcorp(C) Todos los derechos reservados</span>
</footer>
  
  

    <script  src="js/index.js"></script>




</body>

</html>
