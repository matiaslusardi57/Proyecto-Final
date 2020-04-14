<?php 

include("includes/conectar.php");
include("includes/funciones_utiles.php");

$id=$_GET["idBalance"];

$sql = " SELECT *
		 FROM balances
		 WHERE idBalance='$id'
	   ";

$r=mysqli_query($db, $sql);

$c=mysqli_fetch_array($r);
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>agrega examen</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<body>

<div id="vista">
<iframe height="100%" width="100%" src="<?php echo $c["Archivo"];?>"></iframe>
</div>

<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- DataTables JavaScript -->
<script src="js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>


 <script src="js/jquery-1.12.2.js"></script>
     <script src="js/bootstrap.min.js"></script>  
     <script src="js/jquery-ui.js"></script> 
     <link rel="stylesheet" href="js/themes/smoothness/jquery-ui.css">
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <script src="js/jquery-1.12.2.js"></script>
     <script src="js/bootstrap.min.js"></script>	
 </body>
</html>