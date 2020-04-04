<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");


  $padre = recuperar_padre($_SESSION['usuario']);
  $docente = recuperar_docente($_SESSION['usuario']);

 ?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Contraseña</title>
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
<div class="caja3">
  <div class="row">
  <div class="col-lg-offset-5 col-lg-5">
  <h4> Cambiar Contraseña</h4>
  </div>
</div><br>


<form class="form-horizontal"  action="actualizacontrasena.php" method="post" >
  <div class="form-group">
  
  <div class="form-group">
    <label for="inputPassword3" class="col-lg-4 control-label">Contraseña Actual</label>
    <div class="col-lg-5">
      <input type="password" class="form-control" name="pass12" id="pass12" placeholder="Contreseña" required>
    </div>
  </div>
   <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Contraseña Nueva</label>
    <div class="col-lg-5">
      <input type="password" class="form-control" name="pass22" id="pass22" placeholder="Contreseña" required>
    </div>
  </div>
  <div class="row"> 
<div class="col-lg-offset-5 col-sm-7">
  <?php
if (isset($_GET["q"])) {
  if($_GET["q"]==1) {
    
 ?><span><b><?php  echo   "Error en el cambio , verifique la contraseña";?></b></span>
    <?php
  }}
?>
</div> 
</div>
  <div class="form-group" style="margin:30px 30px">
  <div class="col-lg-offset-4 col-lg-1">
        <button type="button" class="btn btn-default btn-lg btn-block" onclick="history.back()">Volver</button>
         </div>
    <div class="col-lg-offset-1 col-lg-2">
     <input type="submit" value="Confirmar" class="btn btn-success btn-lg btn-block">
    </div>
      
  </div>
  
</form>

       
        
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
