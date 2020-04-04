<?php
   include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");

$admin = recuperar_admin($_SESSION['usuario']);

session_start();

  if(!isset($_SESSION['usuario'])){
    
    header("vinculouno.php");
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Vinculaciones</title>
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
    <h3>Elegir opcion </h3>
  </div>
</div>


<div class="container" style="margin-top: 20px; margin-bottom: 50px;">
  <div class="col-lg-4 col-lg-offset-1">
    <a href="vincular.php"><img src="img/vinculo2.jpg" class="img-responsive; text-center;" style="width: 100%; height: 250px;" alt="vincular">
    <center>
      <button type="button" class="btn btn-primary" style="margin-top: 20px">Crear Vinculos</button>
    </center>
    </a>
  </div>
    <div class="col-lg-4 col-lg-offset-2">
    <a href="vinculoeliminar.php"><img src="img/vinculo3.jpg" class="img-responsive; text-center;" style="width: 100%; height: 250px;" alt="Eliminar vinculo">
    <center>
      <button type="button" class="btn btn-primary" style="margin-top: 20px">Eliminar Vinculos</button>
    </center>
    </a>
  </div>
</div>
 <div class="row" style="margin:20px 0;">
    <div class="col-lg-offset-5 col-lg-2">
      <a href="inicioadm.php" role="button" class="btn btn-default btn-lg btn-block"> 
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