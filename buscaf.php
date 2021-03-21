<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");


$docente = recuperar_docente($_SESSION['usuario']);

 ?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Buscar Alumno</title>
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
 

 <br>

 <div class="row">
 <div style="text-align:center;">
<h1><?php echo $docente['NombreApellido'] ?></h1>
</div>
</div>

<div class="caja3">


<form class="form-horizontal" action="buscaalumno.php" method="get" autocomplete="off">
  <div class="form-group">
    <label for="inputPassword3" class="col-lg-offset-2 col-lg-2 control-label">Nombre/Apellido</label>
    <div class="col-lg-4">
      <input type="text" class="form-control" id="inputPassword3" placeholder="Nombre o Apellido" name="buscar">
    </div>
      <div class="form-group">
    <div class="col-lg-3" >
        <input type="submit" value="Buscar" name="enviando" class="btn btn-success">
    </div>
  </div>
  </div>

</form>
      <div class="row" style="margin:20px 0;">
          <div class="col-lg-offset-5 col-lg-2">
           <a href="catedras.php" role="button" class="btn btn-primary btn-sm btn-block"> 
            <p style="margin: 3px 0;">Volver</p>
           </a>
          </div>
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