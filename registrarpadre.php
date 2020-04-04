<?php 
// *****************************************************************************
// Nombre: personas-borrar.php
// Descripción: 
// Autor: 
// Fecha de creación: 
// Fecha de modificacion: 99/99/9999 Autor: xxx  Modificación: xxxxxxxx
//******************************************************************************

include("includes/conectar.php");


$usuario = $_POST['dni'];

$consulta = "SELECT *
			 FROM padre
			 WHERE DNI_padre='$usuario';
			";

$resultado = mysqli_query($db, $consulta);
//echo $consulta;
$c = mysqli_num_rows($resultado);

if($c == 0){
	$sql = "INSERT INTO padre (DNI_padre, NombreApellido, Direccion, Telefono, Contrasena)
        	VALUES ('". $_POST["dni"]."',
		        	'". $_POST["nomyap"]."',
					'". $_POST["direccion"]."',
					'". $_POST["telefono"]."',
					'". $_POST["contrasena"]."'
					)" ;

$rs = mysqli_query($db, $sql);

//echo $sql;
header('Location: abmpadres.php');

}	

else{
	header("Location: padrenuevo.php?d=1");
	///cartel de que el usuario ya existe			
}
	

?>