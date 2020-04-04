<?php 


include("includes/conectar.php");
$otro=$_GET["idOtro"];
$grado=$_GET["Nro_grado"];

$sql = "DELETE FROM comunicado WHERE idOtro = " . $_GET["idOtro"];
$rs = mysqli_query($db, $sql);

header('Location: agregacomunicado.php?Grado_Nro_grado='. $grado);
?>
