<?php 
include("includes/conectar.php");

  
	$sql = "INSERT INTO noticias (Fecha, Titulo, Contenido, Imagen)
       		VALUES ('". $_POST["fecha"]."',
		        	'". $_POST["titulo"]."',
					'". $_POST["contenido"]."',
					'". $_POST["imagen"]."'
					)" ; 

$rs = mysqli_query($db, $sql);


header('Location: abmnoticias.php');


?>