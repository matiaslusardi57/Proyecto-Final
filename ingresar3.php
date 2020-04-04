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
	<title>Hijo</title>
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
$c=$_GET["DNI_Alumno"];

$hij=recuperar_h("$c");
?>


<h1 style="text-align:center;"><?php echo $hij['NombreApellido'] ?></h1>

<div class="caja">
<div class="row">
<div class="col-sm-offset-2 col-lg-2">
<a class="btn btn-link" onClick="buscamat(<?php echo $hij["DNI_Alumno"] ?>)">
<center>
<img src="img/materias.gif" height="200" style="width: 200px;" alt="materias"><br>
<button type="button" class="btn btn-link" onClick="buscamat(<?php echo $hij["DNI_Alumno"] ?>)"><h4>MATERIAS</h4></button>
</center>
</a>
</div>
<div class="col-sm-offset-1 col-lg-2">
<a class="btn btn-link" onClick="buscaavi(<?php echo $hij["DNI_Alumno"] ?>)">
<center>
<img src="img/avisos.png" height="200" style="width: 200px;" alt="avisos"><br>
<button type="button" class="btn btn-link" onClick="buscaavi(<?php echo $hij["DNI_Alumno"] ?>)"><h4>AVISOS</h4></button>
</center>
</a>
</div>
<div class="col-sm-offset-1 col-lg-3">
<a class="btn btn-link" onClick="buscaotr(<?php echo $hij["DNI_Alumno"] ?>)">
<center>
<img src="img/tel.jpg" height="200" style="width: 200px;" alt="comunicados"><br>
<button type="button" class="btn btn-link" onClick="buscaotr(<?php echo $hij["DNI_Alumno"] ?>)"><h4>COMUNICADOS</h4></button>
</center>
</a>
</div>
  </div>
    <div class="row" style="margin:20px 0;">
         <div class="col-lg-offset-5 col-lg-2">
         <button type="button" class="btn btn-default btn-lg btn-block" onclick="history.back()">Volver</button>
        
         </div>
         </div> 
</div>

   <script>



  function buscamat(DNI_Alumno) {
    location.href = "materias.php?DNI_Alumno=" + DNI_Alumno;
    }


  function buscaavi(DNI_Alumno) {
    location.href = "avisos.php?DNI_Alumno=" + DNI_Alumno;
    }

     function buscaotr(DNI_Alumno) {
    location.href = "otros.php?DNI_Alumno=" + DNI_Alumno;
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
