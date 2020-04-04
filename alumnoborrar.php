<?php 


include("includes/conectar.php");


$sql = "DELETE FROM alumno WHERE DNI_Alumno = " . $_GET["DNI_Alumno"];
$rs = mysqli_query($db, $sql);

header('Location: abmalumnos.php');
?>
