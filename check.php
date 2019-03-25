<html>
<body>

<?php
session_start();
?>

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


$sql = "SELECT * FROM Users";

$pass=$_POST["passwrd"];
$usrname=$_POST["usrname"];
$prev = 0;
$result = $conn->query($sql);
$usercheck = mysqli_query($conn,"SELECT * FROM `Users` WHERE UserName = '".$usrname."' and Password = '".$pass."' ");

$sql4 = "SELECT Blocked FROM Users WHERE UserName = '".$usrname."' and Password = '".$pass."' ";
$resultado4 = mysqli_query($conn, $sql4);
$fila4 = mysqli_fetch_row($resultado4);
$sql2 = "SELECT Id_User FROM Users WHERE UserName = '".$usrname."' and Password = '".$pass."' ";
$resultado = mysqli_query($conn, $sql2);
$fila = mysqli_fetch_row($resultado);
if (mysqli_num_rows($usercheck) == 1 && $fila4[0] == 0){
		$_SESSION["id"]=$fila[0];
        $sql3 = "SELECT Admin FROM Users WHERE UserName = '".$usrname."' and Password = '".$pass."' ";
		$resultado1 = mysqli_query($conn, $sql3);
		$fila1 = mysqli_fetch_row($resultado1);
		$prev = 1;
    	if ($fila1[0] == 0){
			header("location:loggedIn.php");
    	}
		else{
			header("location:/Admin/vistaUsuarios.php");
		}
}
elseif (mysqli_num_rows($usercheck) == 1 && $fila4[0] == 1){
	echo "<script>window.alert('El usuario ingresado ha sido bloqueado.');</script>";
	echo "<script>location.replace('Login.php');</script>"; 
}
//echo "<script>window.alert('" . $usercheck . "');</script>";
elseif (mysqli_num_rows($usercheck) == 0){
	echo "<script>window.alert('Usuario o contraseña incorrectos. Vuelva a intentarlo!');</script>";
	echo "<script>location.replace('Login.php');</script>"; 
}

$conn->close();
?> 

</body>
</html>