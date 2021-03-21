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
	<title>Practicos</title>
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
  <script language=javascript>
  function ventanasecundaria (idPracticos) {
    window.open("veronlinepractico.php?idPracticos=" + idPracticos);
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

$consulta="select distinct p.`Numero`, p.`Descripcion`, p.`Resultado`, p.`Fecha_entrega_practico`, p.`practico_grado`, p.`Materia_Cod_materia`, p.`idPracticos`
from `practicos`p
inner join `materia`m 
on p.`Materia_Cod_materia`=m.`Cod_materia` 
inner join `grado`g 
on m.`Grado_Nro_grado`=g.`Nro_grado` 
inner join `alumno`a 
on g.`Nro_grado`= a.`Grado_Nro_grado` 
where p.`practico_grado`=$pp and p.`Materia_Cod_materia`=$a";

$resultado=mysqli_query($db, $consulta);
   
 ?>
<br>
<h1 style="text-align:center;"><?php echo $hij['NombreApellido'] ?>/ <?php  echo $mato['Descripcion'] ?> </h1>



<div class="caja3">

<div class="row">
<div class="visible-lg col-sm-offset-2 col-lg-2">
<img src="img/practicos.png" height="200"  style="margin:50px 0; width: 200px; " alt="logo practico"><br>
</div>
<?php  
if (is_object($resultado) && $resultado->num_rows > 0) {

?>

<div class="table-responsive col-lg-6">
<h4>Practicos</h4>
  <table class="table" style="margin:15px 0;">
   <tr class="success"></tr>
 <tr class="success"></tr>
 <tr class="success"></tr>
 <tr class="success"></tr>
 


<tr>

 <td class="success"><h4>Nro</h4> </td>
 <td class="success"><h4>Fecha entrega</h4></td>
 <td class="success"><h4>Contenido</h4></td>
 <td class="success"><h4>Correccion</h4></td>

  
</tr>
  <?php  
while (($fila=mysqli_fetch_array($resultado))==true) {
  ?>
 <tr class="warning"></tr>
 <tr class="danger"></tr>
 <tr class="warning"></tr>
 <tr class="danger"></tr>
 


<tr>
 <td class="warning"> <?php  echo $fila["Numero"] . " ";?></td>
 <td class="danger">  <?php  echo $fila["Fecha_entrega_practico"] . " ";?></td>
 <td class="warning">  <?php  echo $fila["Descripcion"] . " ";?></td>
 <td class="danger">
  <a href="javascript:ventanasecundaria('<?php echo $fila["idPracticos"]; ?>')"><?php echo $fila["Resultado"]; ?></a>
 </td>

  
</tr>
<?php 
;
}
}
else { ?>
<div class="col-sm-offset-3 col-lg-4" style="margin:100px 0;"><h1> <?php echo "Sin Practicos Por El Momento";?></h1></div>
   

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
