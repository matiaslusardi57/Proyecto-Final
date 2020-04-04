<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");

session_start();

  if(!isset($_SESSION["usuario"])){

    header("location:padrenuevo.php");
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Seguimiento</title>
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

<div class="container" style="text-align:center; margin:20px 20px;"> 
<h4>Complete los siguientes campos:</h4>
</div>

<div class="container-fluid">

    <?php if(isset($_GET["d"])) { 
      ?> 
    
    <div class="row" style="margin-top: 20px; text-align:center;">
      <?php echo "<p style='color:red;'>* DNI existente</p>"; ?> 
    </div>


  <form class="form-horizontal" action="registrarpadre.php" method="post">
        <div class="form-group">
            <label for="dni" class="col-lg-3 control-label" style="text-align: center;">DNI</label>
                <div class="col-lg-8">
                  <input type="number" REQUIRED class="form-control" name="dni" placeholder="DNI">
                </div>
        </div>
        <div class="form-group">
            <label for="nomyap" class="col-lg-3 control-label" style="margin-top: 7px; text-align: center;">Nombre y Apellido</label>
                <div class="col-lg-8">
                  <input type="text" REQUIRED class="form-control" name="nomyap" placeholder="Nombre y Apellido">
                </div>
        </div>
        <div class="form-group">
            <label for="direccion" class="col-lg-3 control-label" style="margin-top: 7px; text-align: center;">Direccion</label>
                <div class="col-lg-8">
                  <input type="text" REQUIRED class="form-control" name="direccion" placeholder="Direccion">
                </div>
        </div>
        <div class="form-group">
            <label for="telefono" class="col-lg-3 control-label" style="margin-top: 7px; text-align: center;">Telefono</label>
                <div class="col-lg-8">
                  <input type="number" REQUIRED class="form-control" name="telefono" placeholder="telefono">
                </div>
        </div>
        <div class="form-group">
            <label for="contrasenia" REQUIRED class="col-lg-3 control-label" style="margin-top: 7px; text-align: center;">Contraseña</label>
                <div class="col-lg-8">
                  <input type="password" class="form-control" name="contrasena" placeholder="Contraseña">
                </div>
        </div>
        <div class="form-group" style="margin-top: 20px;">
            <div class="col-lg-offset-3 col-lg-6">
                <input type="submit" value="Agregar" class="btn btn-success btn-lg btn-block">
            </div>
        </div>
    </form>


    <?php } 
    else {?>


      <form class="form-horizontal" action="registrarpadre.php" method="post">
          <div class="form-group">
              <label for="dni" class="col-lg-3 control-label" style="text-align: center;">DNI</label>
                  <div class="col-lg-8">
                    <input type="text" REQUIRED class="form-control" name="dni" placeholder="DNI">
                  </div>
          </div>
          <div class="form-group">
              <label for="nomyap" class="col-lg-3 control-label" style="margin-top: 7px; text-align: center;">Nombre y Apellido</label>
                  <div class="col-lg-8">
                    <input type="nomyap" REQUIRED class="form-control" name="nomyap" placeholder="Nombre y Apellido">
                  </div>
          </div>
          <div class="form-group">
              <label for="direccion" class="col-lg-3 control-label" style="margin-top: 7px; text-align: center;">Direccion</label>
                  <div class="col-lg-8">
                    <input type="direccion" REQUIRED class="form-control" name="direccion" placeholder="Direccion">
                  </div>
          </div>
          <div class="form-group">
              <label for="telefono" class="col-lg-3 control-label" style="margin-top: 7px; text-align: center;">Telefono</label>
                  <div class="col-lg-8">
                    <input type="telefono" REQUIRED class="form-control" name="telefono" placeholder="telefono">
                  </div>
          </div>
          <div class="form-group">
              <label for="contrasenia" REQUIRED class="col-lg-3 control-label" style="margin-top: 7px; text-align: center;">Contraseña</label>
                  <div class="col-lg-8">
                    <input type="password" class="form-control" name="contrasena" placeholder="Contraseña">
                  </div>
          </div>
          <div class="form-group" style="margin-top: 20px;">
              <div class="col-lg-offset-3 col-lg-6">
                  <input type="submit" value="Agregar" class="btn btn-success btn-lg btn-block">
              </div>
          </div>
      </form>
    <?php } ?>
</div>


<div class="col-lg-6 col-lg-offset-3" style="margin-top: 20px; margin-bottom: 20px;">  
      <button class="btn btn-primary btn-lg btn-block" onclick="volver()">Volver</botton>
</div>

<script>
    function volver() {
    location.href = "abmpadres.php";
  }  

</script>



    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

 
<div class="clearfooter"></div>

</div>


<?php
  include("zfooter.php");
?>


 
</body>
</html>