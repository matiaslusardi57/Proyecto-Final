<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");


$docente = recuperar_docente($_SESSION['usuario']);

 ?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Buscar alumno</title>
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

<div id="todo">
 

 <br>

 <div class="row">
 <div style="text-align:center;">
<h1><?php echo $docente['NombreApellido'] ?></h1>
</div>
</div>

<div class="caja3">


<form class="form-horizontal" action="buscaalumno.php" method="get">
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
           <a href="docente1.php" role="button" class="btn btn-default btn-lg btn-block"> 
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