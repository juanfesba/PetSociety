<?php
	session_start();
	$servername = "198.71.225.57";
	$username = "granescala";
	$password = "Granescala.123";
	$dbname = "GE";
	$Id = $_SESSION["id"];
	$idUser=$_POST["idUser"];
	$blocked = 0;

	$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}


	$sql = "UPDATE Users SET Blocked = '".$blocked."' WHERE Id_User ='".$idUser."'";
	mysqli_query($conn, $sql);
	$conn->close();
	header("location:vistaUsuarios.php");
?>