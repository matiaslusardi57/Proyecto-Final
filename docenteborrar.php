<?php 


include("includes/conectar.php");


$sql = "DELETE FROM docente WHERE DNI_docente = " . $_GET["DNI_docente"];
$rs = mysqli_query($db, $sql);

header('Location: abmdocentes.php');
?>
