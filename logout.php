<?php
session_start();
if ($_SESSION["id"] == -1) {
  header("location:Login.php");
}
else
{
  $_SESSION["id"] = -1;
  echo "<script>window.alert('Haz cerrado sesión correctamente.');</script>";
  echo "<script>location.replace('index.html');</script>";
}
?>