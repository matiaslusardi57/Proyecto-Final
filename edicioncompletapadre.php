<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");

session_start();

  if(!isset($_SESSION["usuario"])){

    header("location:edicioncompleta.php");
  }

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Seguimiento</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<?php

$dni = $_POST['dni'];
$nomyap = $_POST['nomyap'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];


//Arma la instrucción SQL y luego la ejecuta
$sql = "UPDATE padre set DNI_padre='$dni', NombreApellido='$nomyap', Direccion='$direccion', Telefono='$telefono'
 		where DNI_padre='$dni'
		";

mysqli_query($db, $sql);

//echo $sql;
header("location: abmpadres.php");


// Cerrar la conexion
mysqli_close($db);
?>
<body>
</body>
</html>