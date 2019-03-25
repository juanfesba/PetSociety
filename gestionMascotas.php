<?php
session_start();
$servername = "198.71.225.57";
$username = "granescala";
$password = "Granescala.123";
$dbname = "GE";
$Id = $_SESSION["id"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT * FROM Pets JOIN Users USING(Id_User) WHERE Id_User ='".$Id."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $concat=

'
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestionar Mascotas</title>

    <script>
    function myFunction(p1,u1) {
          $_SESSION["idpet"] = p1;
        }
    }

    function myFunction2() {
      var nombre= document.getElementById("myInput");
      var filternom = nombre.value.toUpperCase();

      var nombre2= document.getElementById("myInput2");
      var filternom2 = nombre2.value.toUpperCase();

      var j=1;
      while(j<'.(string)($result->num_rows+1).'){
        var input = document.getElementById(j);
        if (input!=null && input.getAttribute("data-animal-name").toUpperCase().indexOf(filternom) > -1 && input.getAttribute("data-animal-tipo").toUpperCase().indexOf(filternom2) > -1) {
          input.style.display = "";
        } else {
          input.style.display = "none";
        }
        j=j+1;
      }
    }

    </script>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/4-col-portfolio.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Pet Society</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/../index.html">Página Principal
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Gestión de Mascotas
        <small>Modifica sus datos, puedes ponerla en adopción, venta o subasta.</small>
      </h1>


      <b>Filtrar por nombre:  </b><input type="text" id="myInput" onkeyup="myFunction2()" placeholder="Escribe aqui..." title="Filtrar por nombre">
      <br><b>Filtrar por tipo:  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b><input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Escribe aqui..." title="Filtrar por tipo">
      <br>
      <br>
      <div class="row">

';
  
  $i=0;
  while($row = $result->fetch_assoc()) {
      //$concat=$concat . $row["NombreAnimal"];
    $i=$i+1;
    $concat=$concat .
'
        <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item" id='.$i.' data-animal-name="'.$row["Animal"].'" data-animal-tipo="'.$row["Tipo"].'">

          <div class="card h-100">
            <a onclick="myFunction('.$row["Id_Pet"].','.$row["Id_User"].')" href="gestionarMascota.php" style="cursor:pointer;">'.'<img class="card-img-top" src="/../imgupload/'. $row["Foto"] . '"  alt="" height="200" width="200"></a>
            <div class="card-body">
              <h4 class="card-title">
                <a onclick="myFunction('.$row["Id_Pet"].','.$row["Id_User"].')" href="gestionarMascota.php" style="cursor:pointer;">'. $row["Animal"] .'</a>
              </h4>
              <p class="card-text"> Descripción: '. $row["Descripcion"] .'<br>Cuidados especiales: '.$row["CuidadosEsp"].'<br>Sexo: '.$row["Sexo"] .'<br>Tipo: '.$row["Tipo"] .'</p>
            </div>
          </div>
        </div>
';

  }


$concat=$concat .
'
      </div>
      <!-- /.row -->

      <!-- Pagination -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Pet Society 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
';


  echo $concat;

}
else {
  echo 
'
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestion de Mascotas</title>

    <script>
    function myFunction(p1) {
        if (confirm("Deseas adoptar? Recuerda que si aceptas se le notificará al dueño.")){
          window.alert("holi1");
          $.post( "adoptar.php", { name: "John", time: "2pm" } );
          window.alert("holi2");
        }
    }
    </script>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/4-col-portfolio.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Pet Society</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/../index.html">Página Principal
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Gestión de Mascotas
        <small>Modifica sus datos, puedes ponerla en adopción, venta o subasta.</small>
      </h1>


      
      <div class="row">
      </div>
      <!-- /.row -->

      <!-- Pagination -->
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item">
          <a class="page-link" onclick="myFunction()">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Pet Society 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
';
}




$conn->close();
?> 
