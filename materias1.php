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
	<title>materias1</title>
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

  <?php
$a=$_GET["Cod_materia"];
$c=$_GET["DNI_Alumno"];

$hij=recuperar_h("$c");
$pp=$hij['Grado_Nro_grado'];

$consulta="select distinct m.`Cod_materia`,m.`Descripcion`,m.`Contenido`,m.`Grado_Nro_grado`
from `materia`m
inner join `grado`g
on m.`Grado_Nro_grado`=g.`Nro_grado`
inner join `alumno`a
on g.`Nro_grado`= a.`Grado_Nro_grado`
where g.`Nro_grado`=$pp and m.`Cod_materia`=$a";

$resultado=mysqli_query($db, $consulta);
   
while (($fila=mysqli_fetch_row($resultado))==true) {




 ?>
<br>
<h1 style="text-align:center;"><?php echo $hij['NombreApellido'] ?>/ <?php  echo $fila[1] ?> </h1>


<div class="caja">

<div class="row">
<div class="col-sm-offset-2 col-lg-2">
<a class="btn btn-link" onClick="buscacodigo1(<?php echo $fila[0].','.$c ?>)">
<center>
<img src="img/tarea.jpeg" height="200" style="width: 200px;" alt="tareas"><br>        
<button type="button" class="btn btn-link" onClick="buscacodigo1(<?php echo $fila[0].','.$c ?>)"> <h4>Tareas</h4></button>
</center>
</a>
</div>
<div class="col-sm-offset-1 col-lg-3">
<a class="btn btn-link" onClick="buscacodigo2(<?php echo $fila[0].','.$c ?>)">
<center>
<img src="img/examen.jpg" height="200" style="width: 200px;" alt="examenes"><br>
<button type="button" class="btn btn-link" onClick="buscacodigo2(<?php echo $fila[0].','.$c ?>)"> <h4>Examenes</h4></button>
</center>
</a>
</div>
<div class="col-lg-4">
<a class="btn btn-link" onClick="buscacodigo3(<?php echo $fila[0].','.$c ?>)">
<center>
<img src="img/practicos.png" height="200" style="width: 200px;" alt="practicos"><br>
<button type="button" class="btn btn-link" onClick="buscacodigo3(<?php echo $fila[0].','.$c ?>)"><h4>Practicos</h4></button>
</center>
</a>
</div>
  </div>
<?php 
;
}
?>
  <div class="row" style="margin:20px 0;">
         <div class="col-lg-offset-5 col-lg-2">
         <button type="button" class="btn btn-default btn-lg btn-block" onclick="history.back()">Volver</button>
        
         </div>
         </div> 
</div>



    <script>
  


  function buscacodigo1(Cod_materia,DNI_Alumno) {
    location.href = "Tarea.php?Cod_materia=" + Cod_materia + "&DNI_Alumno=" + DNI_Alumno;
    }


  function buscacodigo2(Cod_materia,DNI_Alumno) {
    location.href = "examenes.php?Cod_materia=" + Cod_materia + "&DNI_Alumno=" + DNI_Alumno;
   }
  

  function buscacodigo3(Cod_materia,DNI_Alumno) {
    location.href = "practicos.php?Cod_materia=" + Cod_materia + "&DNI_Alumno=" + DNI_Alumno;
  
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