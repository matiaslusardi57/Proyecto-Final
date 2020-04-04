<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");

session_start();

  if(!isset($_SESSION["usuario"])){

    header("location:docenteeditar.php");
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
<h4>Modifique los campos que desee:</h4>
</div>

<div class="container-fluid">

<?php

$padre = $_GET["DNI_padre"];

$sql = "SELECT * 
        FROM padre 
        WHERE DNI_padre ='$padre' ";

$resultado = mysqli_query($db, $sql);

$fila = mysqli_fetch_array($resultado);

?>

  <form class="form-horizontal" action="edicioncompletapadre.php" method="post">
        <div class="form-group">
            <label for="dni" class="col-lg-3 control-label" style="text-align: center;">DNI</label>
                <div class="col-lg-8">
                  <input type="number" REQUIRED class="form-control" name="dni" value="<?php echo($fila['DNI_padre']); ?>">
                </div>
        </div>
        <div class="form-group">
            <label for="nomyap" class="col-lg-3 control-label" style="margin-top: 7px; text-align: center;">Nombre y Apellido</label>
                <div class="col-lg-8">
                  <input type="text" REQUIRED class="form-control" name="nomyap" value="<?php echo($fila['NombreApellido']); ?>">
                </div>
        </div>
        <div class="form-group">
            <label for="direccion" class="col-lg-3 control-label" style="margin-top: 7px; text-align: center;">Direccion</label>
                <div class="col-lg-8">
                  <input type="text" REQUIRED class="form-control" name="direccion" value="<?php echo($fila['Direccion']); ?>">
                </div>
        </div>
        <div class="form-group">
            <label for="telefono" class="col-lg-3 control-label" style="margin-top: 7px; text-align: center;">Telefono</label>
                <div class="col-lg-8">
                  <input type="number" REQUIRED class="form-control" name="telefono" value="<?php echo($fila['Telefono']); ?>">
                </div>
        </div>
        <div class="form-group" style="margin-top: 20px;">
            <div class="col-lg-offset-3 col-lg-6">
                <input type="submit" value="Editar" class="btn btn-success btn-lg btn-block">
            </div>
        </div>
    </form>
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