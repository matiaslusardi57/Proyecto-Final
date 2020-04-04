<?php
  include("includes/conectar.php");  
  include("includes/funciones_utiles.php");


session_start();

if(!isset($_SESSION['usuario'])){ ?>
    
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Ingresar</title>
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

<div class="caja">
  <div class="row">
  <div class="col-lg-offset-4 col-lg-4" style="text-align: center;">
  <h4>Iniciar Sesion</h4>
  </div>

    </div><br>



<form class="form-horizontal" action="ingresarok.php" method="post" data-toggle="validator" role="form">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">DNI</label>
    <div class="col-lg-4">
      <input type="number" class="form-control" id="inputEmail3" placeholder="DNI" name="DNI" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Contraseña</label>
    <div class="col-lg-4">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Contreseña" name="pass" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-12" style="text-align: center;">
      <a href="recupcuenta.php">
        <p>¿Olvidaste tu contraseña?</p>
      </a>
    </div>
  </div>
<div class="row"> 
<div class="col-lg-offset-4 col-sm-7">
<?php
if (isset($_GET["e"])) {
  if($_GET["e"]==1) {
    
 ?><span><b><?php  echo   "Error de usuario , verifique el DNI y la contraseña";?></b></span>
    <?php
  }}
?>
</div> 
</div>
  <div class="form-group">
    <div class="col-lg-4 col-lg-offset-4" style="text-align: center;">
        <input type="submit" value="Ingresar" class="btn btn-success btn-block" >
    </div>
  </div>
</form>






</div>


<div class="clearfooter"></div>
</div>

<?php
  include("zfooter.php");
 ?>

<?php }

else {


$sql = "SELECT * FROM `padre` WHERE DNI_padre=".$_SESSION["usuario"]." 
       ";

$rs = mysqli_query($db, $sql) or die(mysql_error($db));

if (is_object($rs) && $rs->num_rows > 0) {

  Header("Location: ingresar1.php");

} 
else {
//echo "no";

      $sql = "SELECT * FROM `docente` WHERE DNI_docente=".$_SESSION["usuario"]." 
       ";

      $rs = mysqli_query($db, $sql) or die(mysql_error($db));

      if (is_object($rs) && $rs->num_rows > 0) {
  
      Header("Location: docente1.php");

                                        } 
    

      else {
      
      $sql = "SELECT * FROM `administrador` WHERE DNI_admin=".$_SESSION["usuario"]." 
       ";

      $rs = mysqli_query($db, $sql) or die(mysql_error($db));

      if (is_object($rs) && $rs->num_rows > 0) {
  
          Header("Location: inicioadm.php");

                                          } 

    

          }
      }
}

?>
  


<script src="js/jquery-1.12.2.js"></script>
<script src="js/bootstrap.min.js"></script>

	
</body>
</html>