<?php 


include("includes/conectar.php");


$sql = "DELETE FROM balances WHERE idBalance = " . $_GET["idBalance"];
$rs = mysqli_query($db, $sql);

header('Location: abmbalances.php');
?>
