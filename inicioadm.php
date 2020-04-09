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