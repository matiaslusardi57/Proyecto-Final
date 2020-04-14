<?php 

include("includes/conectar.php");
require("includes/requiere_login.php");
include("includes/funciones_utiles.php");


	$carpeta = "uploads/";
	$destino = $carpeta .basename($_FILES['archivo']['name']);	
	move_uploaded_file($_FILES['archivo']['tmp_name'], $destino);

	$actual = date('Y');

	$sql = "INSERT INTO balances (Fecha, Anio, Comentario, Archivo)
  		VALUES ('". $_POST["fecha"]."',
  				'". $actual."',
		       	'". $_POST["comentario"]."',
				'". $destino."'
				)" ; 

$rs = mysqli_query($db, $sql);		 

header('Location: abmbalances.php');

?>

	
