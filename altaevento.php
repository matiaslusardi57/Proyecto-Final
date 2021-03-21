<?php 
include("includes/conectar.php");

$array_fecha = explode("/", $_POST["fecha"]);

	$sql = "INSERT INTO eventos (Anio, Mes, Dia, TituloEvento, Hora, Lugar)
       		VALUES ('". $array_fecha[2]."',
		        	'". $array_fecha[1]."',
					'". $array_fecha[0]."',
					'". $_POST["titulo"]."',
					'". $_POST["hora"]."',
					'". $_POST["lugar"]."'
					)" ; 

/*
	$sql = "INSERT INTO eventos (Anio, Mes, Dia, TituloEvento, Hora, Lugar)
       		VALUES ('". $_POST["anio"]."',
		        	'". $_POST["mes"]."',
					'". $_POST["dia"]."',
					'". $_POST["titulo"]."',
					'". $_POST["hora"]."',
					'". $_POST["lugar"]."'
					)" ; 
*/

$rs = mysqli_query($db, $sql);


header('Location: abmeventos.php');


?>