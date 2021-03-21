<?php
  include("includes/conectar.php");
  include("includes/funciones_utiles.php");

$admin = recuperar_admin($_SESSION['usuario']);

session_start();

  if(!isset($_SESSION['usuario'])){
    
    header("procesavinculo.php");
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Confirma</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="estilo.css">
  <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/site.webmanifest">
<link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="favicon/favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-config" content="favicon/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
</head>

<header>
  <?php
    include("zheader.php");
   ?>
</header>
<body>

<div id="todo">

<?php 

$p=$_POST["padre"];
$a=$_POST["alumno"];

$consulta="insert into `alumno/padre` (`Alumno_DNI_Alumno`,`Padre_DNI_padre`) values ('$a','$p')";

$resultado=mysqli_query($db,$consulta);
 
 ?>
<br><br><br><br><br>
   <div class="row">  
        <div style=" margin-top: 50px; margin-bottom: 50px;">
              <h1 style="text-align:center;">Vinculación Exitosa</h1>
        </div>
    </div>
         
         <div class="row">
         <div class="col-lg-offset-5 col-lg-2">
             <a href="listadop.php"><button type="button" class="btn btn-default btn-lg btn-block">Volver</button></a>
        </div>
         </div>
  



 
<div class="clearfooter"></div>

</div>


<?php
  include("zfooter.php");
?>


     <script src="js/jquery-1.12.2.js"></script>
     <script src="js/bootstrap.min.js"></script>	
</body>
</html>