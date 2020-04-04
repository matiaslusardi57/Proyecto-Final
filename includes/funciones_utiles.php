<?php

function recuperar_docente($DNI) {
	

	$sql = "SELECT DNI_docente, NombreApellido, Direccion, Telefono FROM docente WHERE DNI_docente = '$DNI'";
	$rs = mysqli_query($GLOBALS['db'], $sql) or die(mysqli_error($GLOBALS['db']));
	$row = mysqli_fetch_array($rs);

	return $row;
}

function recuperar_padre($DNI) {
	

	$sql = "SELECT DNI_padre, NombreApellido, Direccion, Telefono FROM padre WHERE DNI_padre = '$DNI'";
	$rs = mysqli_query($GLOBALS['db'], $sql) or die(mysqli_error($GLOBALS['db']));
	$row = mysqli_fetch_array($rs);

	return $row;
}



function recuperar_hijo($H) {
	

	$sql = "select a.`DNI_Alumno`,a.`NombreApellido`,a.`Direccion`,a.`Grado_Nro_grado` from `alumno`a inner join `alumno/padre` on `DNI_Alumno`=`Alumno_DNI_Alumno` inner join `padre` on `DNI_padre`=`Padre_DNI_padre` where `DNI_padre`='$H'";
	$rs = mysqli_query($GLOBALS['db'], $sql) or die(mysqli_error($GLOBALS['db']));
	$row = mysqli_fetch_array($rs);

	return $row;
}

function recuperar_h($J) {
	

	$sql = "select a.`DNI_Alumno`,a.`NombreApellido`,a.`Direccion`,a.`Grado_Nro_grado` from `alumno`a where a.`DNI_Alumno` ='$J'";
	$rs = mysqli_query($GLOBALS['db'], $sql) or die(mysqli_error($GLOBALS['db']));
	$row = mysqli_fetch_array($rs);

	return $row;
}

function recuperar_materia($MT) {
	

	$sql = "select m.`Cod_materia`,m.`Descripcion`,m.`Contenido`,m.`Grado_Nro_grado` from `materia`m  where m.`Cod_materia`='$MT'";
	$rs = mysqli_query($GLOBALS['db'], $sql) or die(mysqli_error($GLOBALS['db']));
	$row = mysqli_fetch_array($rs);

	return $row;
}

function recuperar_admin($A) {
	

	$sql = "SELECT `DNI_admin`,`Contrasena`,`nombre_admin`
			FROM `administrador`
			where `DNI_admin`='$A'
			";
	$rs = mysqli_query($GLOBALS['db'], $sql) or die(mysqli_error($GLOBALS['db']));
	$row = mysqli_fetch_array($rs);

	return $row;
}



?>