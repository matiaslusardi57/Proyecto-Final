<?php

include("includes/conectar.php");

$sql = "SELECT * FROM `padre` WHERE DNI_padre=".$_POST["DNI"]." AND Contrasena='".$_POST["pass"]."' ";

$rs = mysqli_query($db, $sql) or die(mysql_error($db));

if (is_object($rs) && $rs->num_rows > 0) {
	
	    session_start();

	$row = mysqli_fetch_array($rs);

	$nombre = $row["NombreApellido"];

	$_SESSION['usuario'] = $_POST["DNI"];

	Header("Location: Ingresar1.php");

} 
else {
//echo "no";



		$sq = "SELECT * FROM `docente` WHERE DNI_docente=".$_POST["DNI"]." AND Contrasena='".$_POST["pass"]."' ";

		$r = mysqli_query($db, $sq) or die(mysql_error($db));

		if (is_object($r) && $r->num_rows > 0) {
			
			    session_start();

			$row = mysqli_fetch_array($r);

			$nombre = $row["NombreApellido"];

			$_SESSION['usuario'] = $_POST["DNI"];


			Header("Location: docente1.php");

												}
		

		else {
			
			$sql = "SELECT * FROM `administrador` WHERE DNI_admin=".$_POST["DNI"]." AND Contrasena='".$_POST["pass"]."' ";

			$r = mysqli_query($db, $sql) or die(mysql_error($db));

			//echo $r;

			$c = mysqli_num_rows($r);

			if ( $c > 0) {
			
			session_start();

			$row = mysqli_fetch_array($r);

			$nombre = $row["nombre_admin"];

			$_SESSION['usuario'] = $_POST["DNI"];


			Header("Location: inicioadm.php");
		    			} 
			
			else {

				Header("Location: ingresar.php?e=1");	
			}


			}

}

?>
