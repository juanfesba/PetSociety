<html>
<body>

<?php
$servername = "198.71.225.57";
$username = "granescala";
$password = "Granescala.123";
$dbname = "GE";

$namer=$_POST["namer"];
$lastnamer=$_POST["lastnamer"];
$email=$_POST["email"];
$usrname=$_POST["usrname"];
$pass=$_POST["pass"];
$birthdate=$_POST["birthdate"];
$phonenumber=$_POST["phonenumber"];
$sexo=$_POST["sexo"];
$seccode=$_POST["seccode"];
$cardnumber=$_POST["cardnumber"];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//$daten=DATE($birthdate);
$val1 = "0";
$val2 = "0";
$usercheck = mysqli_query($conn,"SELECT * FROM `Users` WHERE UserName = '".$usrname."'");
//echo $usercheck;

if (mysqli_num_rows($usercheck) > 0) {
	$val1 = "1";
	//echo "<script>window.alert('" . $val1 . "');</script>";
	echo "<script>window.alert('El nombre de usuario ya existe');</script>";
	//$message = '<div class="alert alert-danger">El nombre de usuario ya existe</div>';
	echo "<script>location.replace('registroUsuario.html');</script>";
} 

$emailcheck = mysqli_query($conn,"SELECT * FROM `Users` WHERE Correo = '".$email."'");
//echo $usercheck;

if (mysqli_num_rows($emailcheck) > 0) {
	$val2 = "1";
	//echo "<script>window.alert('" . $val2 . "');</script>";
	$message = '<div class="alert alert-danger">El correo ya existe</div>';
    
	echo "<script>location.replace('registroUsuario.html');</script>";
} 
//echo "<script>window.alert('" . $cardnumber . $seccode . "');</script>";
$sql3 = "INSERT INTO Card (NumberCard,SecurityCode) VALUES ('$cardnumber','$seccode')";
mysqli_query($conn, $sql3);



$sql2 = "SELECT Id_Card FROM Card ORDER BY Id_Card DESC LIMIT 1";
$resultado = mysqli_query($conn, $sql2);
$fila = mysqli_fetch_row($resultado);

if ($val1 == "0" && $val2 == "0") {
	//echo "<script>window.alert('entro');</script>";
	$sql = "INSERT INTO Users (Admin,Tarjeta,Nombre,Apellido,Correo,UserName,Password,Nacimiento,NumContacto,Foto,Blocked,Id_Card)
	VALUES ('0','$cardnumber','$namer','$lastnamer','$email','$usrname','$pass','$birthdate', '$phonenumber', '' ,'0',$fila[0])";
	if ($conn->query($sql) === TRUE){
		//echo "<script>window.alert('Se actualizó correctamente');</script>";
   		echo "<script>location.replace('index.html');</script>";
		} 
		else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
else {
    echo "<script>window.alert('No se pudo actualizar la información');</script>";
    echo "<script>location.replace('registroUsuario.php');</script>";
	}

$conn->close();
?>