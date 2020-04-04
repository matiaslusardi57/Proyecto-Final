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
			 FROM alumno
			 WHERE DNI_Alumno='$usuario';
			";

$resultado = mysqli_query($db, $consulta);
//echo $consulta;
$c = mysqli_num_rows($resultado);

if($c == 0){
	$sql = "INSERT INTO alumno (DNI_Alumno, NombreApellido, Direccion, Grado_Nro_grado)
        	VALUES ('". $_POST["dni"]."',
		        	'". $_POST["nomyap"]."',
					'". $_POST["direccion"]."',
					'". $_POST["selgrado"]."'
					)" ;

$rs = mysqli_query($db, $sql);

//echo $sql;
header('Location: abmalumnos.php');

}	

else{
	header("Location: alumnonuevo.php?d=1");
	///cartel de que el usuario ya existe			
}
	

?>