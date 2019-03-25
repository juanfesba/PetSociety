<?php
	session_start();
	$servername = "198.71.225.57";
	$username = "granescala";
	$password = "Granescala.123";
	$dbname = "GE";
	$Id = $_SESSION["id"];
	$namer=$_POST["namer"];
	$lastnamer=$_POST["lastnamer"];
	$email=$_POST["email"];
	$birthdate=$_POST["birthdate"];
	$phonenumber=$_POST["phonenumber"];
	$sexo=$_POST["sexo"];

	$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "UPDATE Users SET Nombre = '".$namer."', Apellido = '".$lastnamer."', Correo = '".$email."', Nacimiento = '".$birthdate."', NumContacto = '".$phonenumber."' WHERE Id_User = '".$Id."'";
	mysqli_query($conn, $sql);
	$conn->close();
	header("location:index.php");
?>