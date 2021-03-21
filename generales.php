<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");

$admin = recuperar_admin($_SESSION['usuario']);

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Listados Generales</title>
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

<div class="container">
<div class="row" style="text-align:center;">
<h1>Tipos de Listados</h1>
</div>

<div class="container" style="margin-top: 20px; margin-bottom: 50px;">

  <div class="col-lg-4 col-lg-offset-1">
    <a href="generalesPadres.php">
      <img src="img/ph.jpg" class="img-responsive; text-center;" style="width: 100%; height: 250px; padding-right:30px" alt="abm">
      <center>
        <button type="button" class="btn btn-primary" style="margin-top: 20px">Padres-Alumos</button>
      </center>
    </a>
  </div>
  <div class="col-lg-4 col-lg-offset-1">
    <a href="generalesDocentes.php">
      <img src="img/mat.jpg" class="img-responsive; text-center;" style="width: 100%; height: 250px; padding-left:30px" alt="vincular">
      <center>
        <button type="button" class="btn btn-primary" style="margin-top: 20px">Docentes-Materias</button>
      </center>
    </a>
  </div>

</div>

  <div class="row" style="margin:20px 0;">
    <div class="col-lg-offset-5 col-lg-2">
      <a href="inicioadm.php" role="button" class="btn btn-primary btn-sm btn-block"> 
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