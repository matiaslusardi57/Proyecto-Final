<?php 
include("includes/conectar.php");


	$sql = "INSERT INTO eventos (Anio, Mes, Dia, TituloEvento, Hora, Lugar)
       		VALUES ('". $_POST["anio"]."',
		        	'". $_POST["mes"]."',
					'". $_POST["dia"]."',
					'". $_POST["titulo"]."',
					'". $_POST["hora"]."',
					'". $_POST["lugar"]."'
					)" ; 

$rs = mysqli_query($db, $sql);


header('Location: abmeventos.php');


?>