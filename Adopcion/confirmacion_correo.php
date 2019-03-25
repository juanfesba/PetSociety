<html>
<body>

<?php
//session_start();
$servername = "198.71.225.57";
$username = "granescala";
$password = "Granescala.123";
$dbname = "GE";


$to=$_POST["Id"];
$idpet=$_POST["name"];

//$idAdopcion = $_SESSION["id"]

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record

$sql = "SELECT Nombre,Apellido,Correo FROM Users WHERE Id_User=". $to;
$sql2 = "SELECT * FROM Pets WHERE Id_Pet=". $idpet;
//$sql3 = "SELECT Nombre,Apellido,Correo,UserName FROM Users WHERE Id_User=". $idAdopcion;

$result2 = $conn->query($sql2);
$result = $conn->query($sql);
//$result3 = $conn->query($sql3);
echo $result->num_rows.$result2->num_rows.$idpet.$idAdopcion;
if ($result->num_rows > 0) {
    // output data of each row
    // the message
    while($row = $result->fetch_assoc()) {
        $msg = "Señor usuario ".$row["Nombre"]." ". $row["Apellido"];
        $correo =$row["Correo"];
   	}
   	while($row2 = $result2->fetch_assoc()) {
        $msg .= ".\n Su querída mascota ".$row2["Animal"]." fue adoptada por ";
   	}
    /*
    while($row3 = $result3->fetch_assoc()) {
        $msg .= $row3["Nombre"]." ".$row3["Apellido"]." (".$row3["UserName"].")! Felicidades!.\n Puede contactarlo por el correo ".$row3["Correo"];
    }
    */

	  // use wordwrap() if lines are longer than 70 characters 
	  $msg = wordwrap($msg,70);
	  $headers = "MIME-Version: 1.0" . "\r\n";
	  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	  $headers .= "From: Pet Society <petsocietyonline1234@gmail.com>" . "\r\n";
	  // send email
	  mail($correo,"Adopcion realizada!!",$msg,$headers);

} else {
    echo "<script>window.alert('Error');</script>";
}
$conn->close();

?>
</body>
</html>