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
	<title>Inicio Padre</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="estilo.css">
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

<?php if (isset($_GET["p"])) {
  if($_GET["p"]==1) {   ?>
  <p style="color: green; margin-top: 20px; font-size: 20px; text-align: center;">
    <b><?php  echo   "Su contraseña ha sido cambiada con exito";?></b>
  <p>
  <?php }} ?>

<?php

$ps=$padre['DNI_padre'];
$consulta="SELECT COUNT(ap.`Alumno_DNI_Alumno`) 
FROM `docente`d
inner join`alumno/padre`ap
on ap.`Padre_DNI_padre`=d.`DNI_docente`
WHERE $ps =d.`DNI_docente`";

$cantidadHijos=mysqli_query($db, $consulta);
$cant=mysqli_fetch_row($cantidadHijos);
 if ($cant[0] != 0 ) {
    ?>


  <h1 style="text-align:center;">Bienvenido <?php echo $padre['NombreApellido'] ?></h1>
  <?php
$ps=$padre['DNI_padre'];
$consulta="SELECT a.`NombreApellido`, a.`DNI_Alumno`
FROM `padre`p
inner join`alumno/padre`ap
on ap.`Padre_DNI_padre`=p.`DNI_padre`
inner join `alumno`a
on a.`DNI_Alumno`=ap.`Alumno_DNI_Alumno`
WHERE `DNI_padre`=$ps";

$resultado=mysqli_query($db, $consulta);
 $hij=$hijo['DNI_Alumno'];
?>

<div class="caja">
<div class="row">
  <div class="col-md-4 col-lg-offset-2">
  <a class="btn btn-link" onClick="buscaDocente()">
<img src="img/docentePadre.jpg" height="200" style="width: 200px;" hspace="20px" alt="Carpetas hijos"><br> 
<center>
<button type="button" class="btn btn-link"><h4>Usuario Docente</h4></button>
</center>
</a>
</div>
<table align="center" class="col-md-6">
<tr>

  <?php  
while (($fila=mysqli_fetch_row($resultado))==true) {
  ?>


<td>


<a class="btn btn-link"  onClick="buscahij(<?php echo $fila[1] ?>)">
<img src="img/seg.png" height="200" style="width: 200px;" hspace="20px" alt="Carpetas hijos"><br> 
<center>
<button type="button" class="btn btn-link" onClick="buscahij(<?php echo $fila[1] ?>)"><h4> <?php echo $fila[0] ?></h4></button>
</center>
</a>
</td>
<?php 
;
}
?>

</tr>
</table>
</div>
</div>


    <script>


  function buscahij(DNI_Alumno) {
    location.href = "ingresar3.php?DNI_Alumno=" + DNI_Alumno;
    }



    </script>

  <?php }  else{ ?>


<h1 style="text-align:center;">Bienvenido <?php echo $padre['NombreApellido'] ?></h1>
  <?php
$ps=$padre['DNI_padre'];
$consulta="SELECT a.`NombreApellido`, a.`DNI_Alumno`
FROM `padre`p
inner join`alumno/padre`ap
on ap.`Padre_DNI_padre`=p.`DNI_padre`
inner join `alumno`a
on a.`DNI_Alumno`=ap.`Alumno_DNI_Alumno`
WHERE `DNI_padre`=$ps";

$resultado=mysqli_query($db, $consulta);
 $hij=$hijo['DNI_Alumno'];
?>

<div class="caja">
<div class="row">
<table align="center">
<tr>

  <?php  
while (($fila=mysqli_fetch_row($resultado))==true) {
  ?>


<td>


<a class="btn btn-link" onClick="buscahij(<?php echo $fila[1] ?>)">
<img src="img/seg.png" height="200" style="width: 200px;" hspace="20px" alt="Carpetas hijos"><br> 
<center>
<button type="button" class="btn btn-link" onClick="buscahij(<?php echo $fila[1] ?>)"><h4> <?php echo $fila[0] ?></h4></button>
</center>
</a>
</td>
<?php 
;
}
?>

</tr>
</table>
</div>
</div>


    <script>


  function buscahij(DNI_Alumno) {
    location.href = "ingresar3.php?DNI_Alumno=" + DNI_Alumno;
    }



    </script>



  <?php   } ?>

    <script>


  function buscaDocente() {
    location.href = "docente1.php";
    }



    </script>

 
<div class="clearfooter"></div>
</div>


<?php
  include("zfooter.php");
 ?>
 

     <script src="js/jquery-1.12.2.js"></script>
     <script src="js/bootstrap.min.js"></script>	
</body>
</html>