<?php 


include("includes/conectar.php");


$sql = "DELETE FROM padre WHERE DNI_padre = " . $_GET["DNI_padre"];
$rs = mysqli_query($db, $sql);

header('Location: abmpadres.php');
?>
