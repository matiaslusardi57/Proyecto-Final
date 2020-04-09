<?php 


include("includes/conectar.php");


$sql = "DELETE FROM eventos WHERE idEvento = " . $_GET["idEvento"];
$rs = mysqli_query($db, $sql);

header('Location: abmeventos.php');
?>
