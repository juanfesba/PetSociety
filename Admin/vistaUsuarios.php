<?php
session_start();
if ($_SESSION["id"] == -1) {
	header("location:Login.php");
}

$servername = "198.71.225.57";
$username = "granescala";
$password = "Granescala.123";
$dbname = "GE";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT * 
		FROM Users';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>
<html>
<head>
	<title>Lista de usuarios</title>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../lib/w3.css">
<style type="text/css">>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}

input[type=text], input[type=password] {
    width: 50%;
    padding: 12px 20px;
    margin: 0 auto;
    display: block;
    margin-bottom:20px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    color: white;
    padding: 14px 20px;
    margin: 0 auto;
    border: 4px;
    margin-bottom:8px;
    cursor: pointer;
    display: block;
    width: 50%;
}

button:hover {
    opacity: 0.8;
}

label {
  text-align: justify;
  display: block;
  margin: 0 auto;
  width: 50%;
}

.button2 {background-color: #000000;} /* Blue */
.button3 {background-color: #000000;} /* Red */ 

.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}


.imgcontainer {
    text-align: center;
    margin-top: 15px;
}

img.avatar {
    width: 40%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 8px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Montserrat", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 25px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #ffd633;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #ffcc00;
			color: #FFFFFF;
			border-color: #e6b800 !important;
			text-transform: uppercase;
		}
		.button2 {background-color: #000000;} /* Blue */
		.button3 {background-color: #000000;} /* Red */ 

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #ffe680;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}

		button {
		    color: white;
		    padding: 14px 20px;
		    margin: 0 auto;
		    border: 4px;
		    margin-bottom:8px;
		    cursor: pointer;
		    display: block;
		    width: 50%;
		}

		button:hover {
		    opacity: 0.8;
		}
		.button3 {
				background-color: #000000;
				font-family: "Montserrat", sans-serif;
				font-size:15px;
		} /* Blue */
	</style>
</head>
<body>
	<h1>USUARIOS</h1>
	<p>
	<table class="data-table">
		<thead>
			<tr>
				<th>ID Usuario</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Correo</th>
				<th>Usuario</th>
				<th>Contraseña</th>
				<th>Fecha de Nacimiento</th>
				<th>Celular</th>
				<th>Bloqueado</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no 	= 1;
		$total 	= 0;
		$block = "";
		while ($row = mysqli_fetch_array($query))
		{
			if ($row['Blocked'] == 0){
				$block = "No";
			}
			else {
				$block = "Si";
			}
			echo '<tr>
					<td>'.$row['Id_User'].'</td>
					<td>'.$row['Nombre'].'</td>
					<td>'.$row['Apellido'].'</td>
					<td>'.$row['Correo'].'</td>
					<td>'.$row['UserName'].'</td>
					<td>'.$row['Password'].'</td>
					<td>'.$row['Nacimiento'].'</td>
					<td>'.$row['NumContacto'].'</td>
					<td>'.$block.'</td>
				</tr>';
		}?>
		</tbody>
	</table>
	<div class="w3-container w3-white w3-center">

	    <form action="blockUsuario.php" method="post">
	    <label>Para bloquear a un usuario ingrese su ID de Usuario</label>
	    <p>
	    <label>ID del Usuario</label>
	    <input id="idUser" type="text" placeholder="Introduzca el ID del usuario" name="idUser" required>
	    <button type="input" class="button2" >BLOQUEAR</button>
	    </form>

	    <form action="unblockUsuario.php" method="post">
	    <label>Para desbloquear a un usuario ingrese su ID de Usuario</label>
	    <p>
	    <label>ID del Usuario</label>
	    <input id="idUser" type="text" placeholder="Introduzca el ID del usuario" name="idUser" required>
	    <button type="input" class="button2" >DESBLOQUEAR</button>
	    </form>
	<button onclick="window.location.href='../logout.php'"" type="button" class="button3" style="width: 7%" background-color: #f44336;}>Atrás</button>
	</div>
</body>
</html>
