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
	<title>Principal Administrador</title>
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
<?php if (isset($_GET["c"])) {
  if($_GET["c"]==1) {   ?>
  <p style="color: green; margin-top: 20px; font-size: 20px;"><b><?php  echo   "Su contraseña ha sido cambiada con exito";?></b><p>
  <?php }} ?>
<h1>Bienvenido <?php echo $admin['nombre_admin'] ?></h1>

<div class="container">
  <div class="col-lg-12">
    <h3>Que desea hacer?</h3>
  </div>
</div>
</div>

<div class="container" style="margin-top: 20px; margin-bottom: 50px;">
  <div class="col-lg-4 col-lg-offset-1">
    <a href="abmgeneral.php">
      <img src="img/abm.gif" class="img-responsive; text-center;" style="width: 100%; height: 250px; padding-right:30px" alt="abm">
      <center>
        <button type="button" class="btn btn-primary" style="margin-top: 20px">Alta - Baja - Modificacion</button>
      </center>
    </a>
  </div>
  <div class="col-lg-4 col-lg-offset-2">
    <a href="vinculouno.php">
      <img src="img/vinculo1.jpg" class="img-responsive; text-center;" style="width: 100%; height: 250px; padding-left:30px" alt="vincular">
      <center>
        <button type="button" class="btn btn-primary" style="margin-top: 20px">Vinculaciones</button>
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