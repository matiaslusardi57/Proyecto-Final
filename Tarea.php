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
  <title>Tareas</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css"> 
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <script language=javascript>
  function ventanasecundaria (idTareas) {
    window.open("veronlinetarea.php?idTareas=" + idTareas);
  }
  </script>
</head>
<header>
  <?php
    include("zheader.php");
   ?>
</header>
<body>

<div class="container">
 

  <?php
$a=$_GET["Cod_materia"];
$c=$_GET["DNI_Alumno"];
$mato=recuperar_materia("$a");

$hij=recuperar_h("$c");
$pp=$hij['Grado_Nro_grado'];

$consulta="select distinct t.`Numero`,t.`Fecha_entrega_tarea`,t.`Descripcion`,t.`Correccion`,t.`Materia_Cod_materia`,t.`tarea_grado`, t.`idTareas`
from `tareas`t
inner join `materia`m
on t.`Materia_Cod_materia`=m.`Cod_materia`
inner join `grado`g
on m.`Grado_Nro_grado`=g.`Nro_grado`
inner join `alumno`a
on g.`Nro_grado`= a.`Grado_Nro_grado`
where t.`tarea_grado`=$pp and t.`Materia_Cod_materia`=$a";

$resultado=mysqli_query($db, $consulta);
   
 ?>
<br>
<h1 style="text-align:center;"><?php echo $hij['NombreApellido'] ?>/ <?php  echo $mato['Descripcion'] ?> </h1>



<div class="caja3">

<div class="row">
<div class="visible-lg col-sm-offset-2 col-lg-2" style="padding-left: 0px;">
<img src="img/tarea.jpeg" height="200" style="margin:50px 0; width: 200px;" alt="logo tarea"><br>
</div>

<?php  
if (is_object($resultado) && $resultado->num_rows > 0) {

?>

<div class="table-responsive col-lg-6">
<h4>Tareas</h4>
  
  <table class="table" style="margin:15px 0;">
 <tr class="success"></tr>
 <tr class="success"></tr>
 <tr class="success"></tr>
 <tr class="success"></tr>
 


<tr>

 <td class="success"><h4>Nro</h4> </td>
 <td class="success"><h4>Para el</h4></td>
 <td class="success"><h4>Contenido</h4></td>
 <td class="success"><h4>Correccion</h4></td>
 <?php  
while (($fila=mysqli_fetch_array($resultado))==true) {
  ?>
</tr>

 <tr class="warning"></tr>
 <tr class="danger"></tr>
 <tr class="warning"></tr>
 <tr class="danger"></tr>
 


<tr>
 <td class="warning">  <?php  echo $fila["Numero"] . " ";?></td>
 <td class="danger">  <?php  echo $fila["Fecha_entrega_tarea"] . " ";?></td>
 <td class="warning">  <?php  echo $fila["Descripcion"] . " ";?></td>
 <td class="danger">
      <a href="javascript:ventanasecundaria('<?php echo $fila["idTareas"]; ?>')"><?php echo $fila["Correccion"]; ?></a>
 </td>  
</tr>
<?php 
;
}
}
else { ?>
<div class="col-sm-offset-3 col-lg-4" style="margin:100px 0;"><h1> <?php echo "Sin Tareas Por El Momento";?></h1></div>
   

<?php
}
?>
  </table>
</div>
</div>
</div>

  <div class="row" style="margin:20px 0;">
         <div class="col-lg-offset-5 col-lg-2">
         <button type="button" class="btn btn-default btn-lg btn-block" onclick="history.back()">Volver</button>
        
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
