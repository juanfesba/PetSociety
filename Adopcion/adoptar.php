<html>
<body>

<?php
$servername = "198.71.225.57";
$username = "granescala";
$password = "Granescala.123";
$dbname = "GE";

$idpet=$_POST["name"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record
$sql = "DELETE FROM Pets WHERE Id_Pet=". $idpet;
$sq2 = "DELETE FROM Adoption WHERE Id_Pet=". $idpet;

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

if ($conn->query($sq2) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>


</body>
</html>
