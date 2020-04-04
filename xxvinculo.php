<?php 


include("includes/conectar.php");


$alu=$_GET["Alumno_DNI_Alumno"];
$paa=$_GET["Padre_DNI_padre"];


$sql = "DELETE FROM `alumno/padre` WHERE Alumno_DNI_Alumno = $alu and Padre_DNI_padre = $paa";


$rs = mysqli_query($db, $sql);



 header('Location: vinculoeliminarpadre.php');

?>


