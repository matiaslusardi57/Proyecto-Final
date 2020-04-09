<?php 


include("includes/conectar.php");


$sql = "DELETE FROM noticias WHERE idNoticia = " . $_GET["idNoticia"];
$rs = mysqli_query($db, $sql);

header('Location: abmnoticias.php');
?>
