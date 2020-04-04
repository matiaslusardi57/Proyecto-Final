<?php
  include("includes/conectar.php");
  include("includes/funciones_utiles.php");

$admin = recuperar_admin($_SESSION['usuario']);

session_start();

  if(!isset($_SESSION['usuario'])){
    
    header("vinculoeliminar.php");
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Eliminar vinculos</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<header>
  <?php
    include("zheader.php");
   ?>
</header>
<body>

<div class="container">

<div class="container">
  <div class="col-lg-12" style="text-align:center;">
    <h3>Que desea eliminar</h3>
  </div>
</div>


<div class="container" style="margin-top: 20px; margin-bottom: 50px;">
  <div class="col-lg-4 col-lg-offset-1">
    <a href="vinculoeliminarpadre.php"><img src="img/cadenas.jpg" class="img-responsive; text-center;" style="width: 100%; height: 250px;" alt="Eliminar vinculo Padre-Hijo">
    <center>
      <button type="button" class="btn btn-primary" style="margin-top: 20px">Eliminar Vinculo Padre-hijo</button>
    </center>
    </a>
  </div>
    <div class="col-lg-4 col-lg-offset-2">
    <a href="vinculoeliminardoc.php"><img src="img/elim.jpg" class="img-responsive; text-center;" style="width: 100%; height: 250px;" alt="Eliminar vinculo Docente-Materia">
    <center>
      <button type="button" class="btn btn-primary" style="margin-top: 20px">Eliminar Vinculo Docente-materia</button>
    </center>
    </a>
  </div>
</div>
 <div class="row" style="margin:20px 0;">
    <div class="col-lg-offset-5 col-lg-2">
      <a href="vinculouno.php" role="button" class="btn btn-default btn-lg btn-block"> 
        <p style="margin: 3px 0;">Volver</p>
      </a>
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