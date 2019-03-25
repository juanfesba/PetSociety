<?php
	session_start();
	$servername = "198.71.225.57";
	$username = "granescala";
	$password = "Granescala.123";
	$dbname = "GE";
	$Id = $_SESSION["id"];
	$usrname=$_POST["usrname"];

	$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "UPDATE Users SET UserName = '".$usrname."' WHERE Id_User = '".$Id."'";
	mysqli_query($conn, $sql);
	$conn->close();
	header("location:index.php");
?>