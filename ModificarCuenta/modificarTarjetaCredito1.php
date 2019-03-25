<?php
	session_start();
	$servername = "198.71.225.57";
	$username = "granescala";
	$password = "Granescala.123";
	$dbname = "GE";
	$Id = $_SESSION["id"];
	$cardnumber=$_POST["cardnumber"];
	$seccode=$_POST["seccode"];

	$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql1 = "SELECT Id_Card FROM Users JOIN Card Using(Id_Card) WHERE Id_User ='".$Id."'";
	$resultado = mysqli_query($conn, $sql1);
	$fila = mysqli_fetch_row($resultado);

	$sql = "UPDATE Card SET NumberCard = '".$cardnumber."', SecurityCode = '".$seccode."' WHERE Id_Card ='".$fila[0]."'";
	mysqli_query($conn, $sql);
	$conn->close();
	header("location:index.php");
?>