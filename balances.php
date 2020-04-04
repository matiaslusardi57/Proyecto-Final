<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Balances</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<script language=javascript>
function ventanaSecundaria (URL){
window.open("uploads/Notas.pdf","width=100%,height=100%,scrollbars=SI")
}
</script>
	
</head>
<header>
  <?php
    include("zheader.php");
   ?>
</header>
<body>

<div id="todo">

<div class="caja">

<div class="row">

  <div style="text-align: center;">
    <h3>Historial de balances por cada año</h3>
  </div>

<div style="text-align: center; margin-top: 50px;">
   
    <div class="btn-group">
  <button type="button" class="btn btn-primary btn-lg" style="font-size:50px;">2013</button>
  <button type="button" class="btn btn-primary dropdown-toggle btn-lg" style="font-size:50px; margin-right: 10px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret" style="color:white"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" style="font-size:20px;">
    <li><a href="javascript:ventanaSecundaria('uploads/Notas.pdf')">Carnavales</a></li>
     <li role="separator" class="divider"></li>
    <li><a href="javascript:ventanaSecundaria('uploads/Notas.pdf')">Cena Del 9 de julio</a></li>
     <li role="separator" class="divider"></li>
    <li><a href="javascript:ventanaSecundaria('uploads/Notas.pdf')">Torneo de Futbol</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="javascript:ventanaSecundaria('uploads/Notas.pdf')">Fiesta de Fin de año</a></li>
  </ul>
</div>
    <div class="btn-group">
  <button type="button" class="btn btn-primary btn-lg" style="font-size:50px;">2014</button>
  <button type="button" class="btn btn-primary dropdown-toggle btn-lg" style="font-size:50px; margin-right: 10px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret" style="color:white"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" style="font-size:20px;">
    <li><a href="javascript:ventanaSecundaria('uploads/Notas.pdf')">Carnavales</a></li>
     <li role="separator" class="divider"></li>
    <li><a href="javascript:ventanaSecundaria('uploads/Notas.pdf')">Cena Del 9 de julio</a></li>
     <li role="separator" class="divider"></li>
    <li><a href="javascript:ventanaSecundaria('uploads/Notas.pdf')">Torneo de Futbol</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="javascript:ventanaSecundaria('uploads/Notas.pdf')">Fiesta de Fin de año</a></li>
  </ul>
</div>
    <div class="btn-group">
  <button type="button" class="btn btn-primary btn-lg" style="font-size:50px;">2015</button>
  <button type="button" class="btn btn-primary dropdown-toggle btn-lg" style="font-size:50px; margin-right: 10px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret" style="color:white"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" style="font-size:20px;">
    <li><a href="javascript:ventanaSecundaria('uploads/Notas.pdf')">Carnavales</a></li>
     <li role="separator" class="divider"></li>
    <li><a href="javascript:ventanaSecundaria('uploads/Notas.pdf')">Cena Del 9 de julio</a></li>
     <li role="separator" class="divider"></li>
    <li><a href="javascript:ventanaSecundaria('uploads/Notas.pdf')">Torneo de Futbol</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="javascript:ventanaSecundaria('uploads/Notas.pdf')">Fiesta de Fin de año</a></li>
  </ul>
</div>
    <div class="btn-group">
  <button type="button" class="btn btn-primary btn-lg" style="font-size:50px;">2016</button>
  <button type="button" class="btn btn-primary dropdown-toggle btn-lg" style="font-size:50px; margin-right: 10px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret" style="color:white"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu" style="font-size:20px;">
    <li><a href="javascript:ventanaSecundaria('uploads/Notas.pdf')">Carnavales</a></li>
     <li role="separator" class="divider"></li>
    <li><a href="javascript:ventanaSecundaria('uploads/Notas.pdf')">Cena Del 9 de julio</a></li>
     <li role="separator" class="divider"></li>
    <li><a href="javascript:ventanaSecundaria('uploads/Notas.pdf')">Torneo de Futbol</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="javascript:ventanaSecundaria('uploads/Notas.pdf')">Fiesta de Fin de año</a></li>
  </ul>
</div>


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
