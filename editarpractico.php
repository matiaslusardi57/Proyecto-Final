<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");

session_start();

  if(!isset($_SESSION["usuario"])){

    header("location:editarpractico.php");
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
	<link rel="stylesheet" href="js/themes/smoothness/jquery-ui.css">
	<script src="js/jquery-1.12.2.js"></script>
    <script src="js/bootstrap.min.js"></script>  
    <script src="js/jquery-ui.js"></script>
    <script>
    $.datepicker.regional['es'] = {
	 closeText: 'Cerrar',
	 prevText: '<Ant',
	 nextText: 'Sig>',
	 currentText: 'Hoy',
	 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
	 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
	 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
	 weekHeader: 'Sm',
	 dateFormat: 'dd/mm/yy',
	 firstDay: 1,
	 isRTL: false,
	 showMonthAfterYear: false,
	 yearSuffix: ''
	 };
	 $.datepicker.setDefaults($.datepicker.regional['es']);
  	$(function() {
    $( "#datepicker" ).datepicker();
  	});
</script>
 
</head>


<header>
  <?php
    include("zheader.php");
   ?>
</header>
<body>

<div id="todo">

<div class="container" style="margin-top: 20px; margin-bottom: 20px;"> 
<h4>Modifique los campos que desee:</h4>
</div>

<div class="container-fluid">

<?php
$nm=$_GET["Grado_Nro_grado"];
$cm=$_GET["Cod_materia"];

$practico = $_GET["idPracticos"];

$sql = "SELECT * 
        FROM practicos 
        WHERE idPracticos ='$practico' ";

$resultado = mysqli_query($db, $sql);

$fila = mysqli_fetch_array($resultado);

?>

  <form class="form-horizontal" action="edicionpracticoterminada.php" method="post">
  		<div class="hidden">
            <label for="id" class="col-lg-3 control-label" style="text-align: center;">Id</label>
                <div class="col-lg-8">
                  <input type="number" REQUIRED class="form-control" name="id" value="<?php echo $practico; ?>">
                </div>
        </div>
        <div class="form-group">
            <label for="dni" class="col-lg-3 control-label" style="text-align: center;">Numero</label>
                <div class="col-lg-8">
                  <input type="number" REQUIRED class="form-control" name="numero" value="<?php echo($fila['Numero']); ?>">
                </div>
        </div>
        <div class="form-group">
            <label for="nomyap" class="col-lg-3 control-label" style="margin-top: 7px; text-align: center;">Fecha Entrega</label>
                <div class="col-lg-8">
                  <input type="text" REQUIRED class="form-control" name="fecha" id="datepicker" value="<?php echo($fila['Fecha_entrega_practico']); ?>">
                </div>
        </div>
        <div class="form-group">
            <label for="direccion" class="col-lg-3 control-label" style="margin-top: 7px; text-align: center;">Contenido</label>
                <div class="col-lg-8">
                  <input type="text" REQUIRED class="form-control" name="temas" value="<?php echo($fila['Descripcion']); ?>">
                </div>
        </div>
        <div class="hidden">
            <label for="direccion" class="col-lg-3 control-label" style="margin-top: 7px; text-align: center;">Grado</label>
                <div class="col-lg-8">
                  <input type="number" REQUIRED class="form-control" name="grado" value="<?php echo ($fila['practico_grado']); ?>">
                </div>
        </div>
        <div class="hidden">
            <label for="direccion" class="col-lg-3 control-label" style="margin-top: 7px; text-align: center;">Materia</label>
                <div class="col-lg-8">
                  <input type="number" REQUIRED class="form-control" name="materia" value="<?php echo ($fila['Materia_Cod_materia']); ?>">
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
      <button class="btn btn-primary btn-lg btn-block" onclick="volver(<?php echo "$cm".','."$nm" ?>)">Volver</botton>
</div>

<script>
  function volver(Cod_materia,Grado_Nro_grado) {
    location.href = "agregapractico.php?Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;
  }
</script>


 
<div class="clearfooter"></div>

</div>


<?php
  include("zfooter.php");
?>


 
</body>
</html>