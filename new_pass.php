<html>
<body>

<?php

$servername = "198.71.225.57";
$username = "granescala";
$password = "Granescala.123";
$dbname = "GE";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$charactersLength = strlen($characters);
$randomString = "";
for ($i = 0; $i < 10; $i++) {
	$randomString .= $characters[rand(0, $charactersLength - 1)];
}
$usrname=$_POST["usrname"];


$sql = "SELECT Id_User,Correo FROM Users WHERE UserName =  '".$usrname."' " ;

$resultado = $conn->query($sql);


if ($resultado->num_rows > 0) {
	
	while($row = $resultado->fetch_assoc()) {
		
		$id = $row["Id_User"];
		
		$correo = $row["Correo"];
		
	}
	
	$sql2 = "UPDATE Users SET Password='".$randomString."' WHERE Id_User =".$id;

	if ($conn->query($sql2) === TRUE) {
		$msg = "Su nueva contraseña es ".$randomString." \n Recuerde cambiar su contraseña una vez esté cuenta.";

		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From: Pet Society <petsocietyonline1234@gmail.com>" . "\r\n";
		// send email
		mail($correo,"Solicitud de cambio de contraseña",$msg,$headers);
		echo "<script>window.alert('Se le ha enviado un correo con su nueva contraseña.');</script>";
		echo "<script>location.replace('login.html');</script>";
	} else {
		echo "<script>window.alert('Hubo un error cambiando su contraseña. Vuelva a intentarlo!');</script>";
		echo "<script>location.replace('recuperarContraseña.html');</script>"; 
	}	
	
}

else {
echo "<script>window.alert('Usuario o contraseña incorrectos. Vuelva a intentarlo!');</script>";
echo "<script>location.replace('login.html');</script>"; 
}

$conn->close();

?> 

</body>
</html>