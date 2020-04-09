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
	<title>Inicio ADM</title>
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
  <div class="col-lg-12" style="text-align:center; margin:50px 50px;">
    <h1>Elija si quiere dar de alta, dar de baja o modificar</h1>
  </div>
</div>


<div class="container" style="margin-top: 20px; margin-bottom: 50px;">
  <div class="col-lg-6">
    <a href="paginaadmin.php"><img src="img/personas.jpg" class="img-responsive; text-center;" style="width: 100%; height: 250px;" alt="abmdocentes">
    <center>
      <button type="button" class="btn btn-primary">Personas</button>
    </center>
    </a>
  </div>
  <div class="col-lg-6">
    <a href="contenido.php"><img src="img/notievento.jpg" class="img-responsive; text-center;" style="width: 100%; height: 250px;" alt="abmpadres">
    <center style="margin:10px 0;">
      <button type="button" class="btn btn-primary">Contenido Publico</button>
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