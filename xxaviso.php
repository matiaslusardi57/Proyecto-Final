<?php 


include("includes/conectar.php");
$c=$_GET["DNI_Alumno"];

$sql = "DELETE FROM avisos WHERE idAvisos = " . $_GET["idAvisos"];
$rs = mysqli_query($db, $sql);
$c=$_GET["DNI_Alumno"];

header('Location: agregaaviso.php?DNI_Alumno='. $c);

?>
