<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");


  $docente = recuperar_docente($_SESSION['usuario']);

 ?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Principal</title>
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
 <br>
 <div class="row">
 <div style="text-align:center;">
 <?php if (isset($_GET["d"])) {
  if($_GET["d"]==1) {   ?>
  <p style="color: green; margin-top: 20px; font-size: 20px;"><b><?php  echo   "Su contraseña ha sido cambiada con exito";?></b><p>
  <?php }} ?>
<h1>Hola <?php echo $docente['NombreApellido'] ?></h1>
</div>
</div>
  <br><br>
  <div class="container" style="margin-top: 20px; margin-bottom: 50px;">
      <div class="col-lg-3" style="margin-left: 40px;">
        <a href="catedras.php"><img src="img/pizarra.jpg" class="img-responsive; text-center;" style="width: 100%; height: 250px;" alt="abmalumnos">
        <center>
          <button type="button" class="btn btn-primary">Mis Cátedras</button>
        </center>
        </a>
      </div>
      <div class="col-lg-3 col-lg-offset-1">
        <a href="abmmaterial.php"><img src="img/libros.png" class="img-responsive; text-center;" style="width: 100%; height: 250px;" alt="abmalumnos">
        <center>
          <button type="button" class="btn btn-primary">Publicar Material</button>
        </center>
        </a>
      </div>
        <div class="col-lg-3 col-lg-offset-1">
        <a href="abmlibreta.php"><img src="img/libretaonline.png" class="img-responsive; text-center;" style="width: 100%; height: 250px;" alt="abmalumnos">
        <center>
          <button type="button" class="btn btn-primary">Libreta Online</button>
        </center>
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
