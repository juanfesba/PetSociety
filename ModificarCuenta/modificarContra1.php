<?php
	session_start();
	$servername = "198.71.225.57";
	$username = "granescala";
	$password = "Granescala.123";
	$dbname = "GE";
	$Id = $_SESSION["id"];
	$prevpass=$_POST["prevpass"];
	$newpass=$_POST["newpass"];

	$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql1 = "SELECT Password FROM Users WHERE Id_User ='".$Id."'";
	$resultado = mysqli_query($conn, $sql1);
	$fila = mysqli_fetch_row($resultado);

	if($fila[0] == $prevpass)
	{
		$sql = "UPDATE Users SET Password = '".$newpass."' WHERE Id_User ='".$Id."'";
		mysqli_query($conn, $sql);
		$conn->close();
		echo "<script>window.alert('La contraseña actual se modificó correctamente.');</script>";
		echo "<script>location.replace('index.php');</script>";
	}
	else
	{
		echo "<script>window.alert('La contraseña actual no es la correcta.');</script>";
		echo "<script>location.replace('index.php');</script>";
	}
?>