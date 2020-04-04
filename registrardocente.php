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
			 FROM docente
			 WHERE DNI_docente='$usuario';
			";

$resultado = mysqli_query($db, $consulta);
//echo $consulta;
$c = mysqli_num_rows($resultado);

if($c == 0){
	$sql = "INSERT INTO docente (DNI_docente, NombreApellido, Direccion, Telefono, Contrasena)
        	VALUES ('". $_POST["dni"]."',
		        	'". $_POST["nomyap"]."',
					'". $_POST["direccion"]."',
					'". $_POST["telefono"]."',
					'". $_POST["contrasena"]."'
					)" ;

$rs = mysqli_query($db, $sql);

//echo $sql;
header('Location: abmdocentes.php');

}	

else{
	header("Location: docentenueva.php?d=1");
	///cartel de que el usuario ya existe			
}
	

?>