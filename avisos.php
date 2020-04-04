<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");


  $padre = recuperar_padre($_SESSION['usuario']);
  $hijo = recuperar_hijo($padre['DNI_padre']);
   

 ?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Avisos</title>
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
 
  <?php
$c=$_GET["DNI_Alumno"];

$hij=recuperar_h("$c");
?>

<br>
<h1 style="text-align:center;"><?php echo $hij['NombreApellido'] ?></h1>
<?php

$consulta="select a.`Numero`,a.`Descripcion`,a.`Fecha`,a.`Docente` from `avisos`a inner join `alumno`alu on a.`Alumno_DNI_Alumno`= alu.`DNI_Alumno` where alu.`DNI_Alumno`=$c";

$resultado=mysqli_query($db, $consulta);

?>

<div class="caja3">

<div class="row">
<div class="visible-lg col-sm-offset-2 col-lg-2" style="padding-left: 0px;">
<img src="img/avisos.png" height="200"  style="margin:50px 0; width: 200px;" alt="logo avisos"><br>
</div>
<?php  
if (is_object($resultado) && $resultado->num_rows > 0) {

?>
<div class="table-responsive col-lg-6">
<h4>Avisos</h4>
  <table class="table" style="margin:15px 0;">
 <tr class="success"></tr>
 <tr class="success"></tr>
 <tr class="success"></tr>
 <tr class="success"></tr>

 
<tr>

 <td class="success"><h4>Nro</h4> </td>
 <td class="success"><h4>Sobre</h4></td>
  <td class="success"><h4>Fecha</h4> </td>
 <td class="success"><h4>Docente</h4></td>

</tr>
<?php
while (($fila=mysqli_fetch_row($resultado))==true) {
 ?>
<tr>
 <td class="warning">  <?php  echo $fila[0] . " ";?></td>
 <td class="danger">  <?php  echo $fila[1] . " ";?></td>
   <td class="warning">  <?php  echo $fila[2] . " ";?></td>
 <td class="danger">  <?php  echo $fila[3] . " ";?></td>
</tr>
<?php 
;
}
}

else { ?>
<div class="col-lg-4" style="margin:70px 0;"><h1> <?php echo "Sin Avisos Por El Momento";?></h1></div>
   

<?php
}
?>
  </table>
</div>
</div>
  <div class="row" style="margin:20px 0;">
         <div class="col-lg-offset-5 col-lg-2">
         <button type="button" class="btn btn-default btn-lg btn-block" onclick="history.back()">Volver</button>
        
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