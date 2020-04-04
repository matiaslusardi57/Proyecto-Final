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
	<title>Materias</title>
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
$ng=$hij['Grado_Nro_grado'];

?>

<br>
<h1 style="text-align:center;"><?php echo $hij['NombreApellido'] ?></h1>
<?php

$consulta="select m.`Cod_materia`,m.`Descripcion`,m.`Contenido`,m.`Grado_Nro_grado`
from `materia`m
inner join `grado`g
on m.`Grado_Nro_grado`=g.`Nro_grado`
where g.`Nro_grado`=$ng";

$resultado=mysqli_query($db, $consulta);

?>


<div class="caja3">

<div class="row">
<div class="visible-lg col-sm-offset-3 col-lg-2">
<img src="img/materias.gif" height="200" style="margin:100px 0; width: 200px;" alt="logo materias"><br>
</div>



<div class="table-responsive col-lg-3">
<h4>Materias</h4>

  <table class="table">
   <?php
while (($fila=mysqli_fetch_row($resultado))==true) {
 ?>

 <tr class="warning"></tr>


<tr>

 <td class="warning"> <button type="button" class="btn btn-danger" onClick="buscamateria(<?php echo $fila[0].','.$c ?>)"> <?php  echo $fila[1] . " ";?> </button></td>
  


</tr>
<?php 
;
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


    <script>


  function buscamateria(Cod_materia,DNI_Alumno) {
    location.href = "materias1.php?Cod_materia=" + Cod_materia + "&DNI_Alumno=" + DNI_Alumno;
    
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