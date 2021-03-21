<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="estilo.css">
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="js/arriba.js"></script>
<link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
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

<span class="ir-arriba">
  <span class="glyphicon glyphicon-chevron-up"  style="color:#fff;"></span>
</span>


<div class="container">
  <div class="row" style="margin-top: 50px;">
    <div class="col-lg-6">
    <h4 style="text-align: left;">SOBRE NUESTRO QUERIDO PUEBLO..</h4>
    <p>
      Villa Amelia es una localidad argentina de la Provincia de Santa Fe.<br>
      Fue fundada en las inmediaciones de la estación del ferrocarril General Belgrano, a 25 km de Rosario, hasta donde se conecta -vía ruta 16- por la Ruta Provincial 18 o la Autopista. Se ubica a 6 km de Coronel Domínguez y a 8 de Albarellos.<br>
      Además de la actividad agropecuaria, que ocupa directa e indirectamente al 50 % de su población, las fuentes de empleo de Villa Amelia son el criadero de Paladini -emplea a unas 100 personas, algunas de ellas también de Coronel Bogado- y el microemprendimiento para el mantenimiento del corredor vial cercano que llevó adelante la comuna.<br>
      La empresa ONAS C.A.P.S.A. (distribuidora de productos Puma Energy) tiene su sede administrativa en Villa Amelia (situada en Rivadavia 460) y además posee una estación de servicio en la localidad con domicilio en San Martín 496.
    </p>
    </div>
    <div class="col-lg-6">
    <img src="img/cartel.png" alt="escuela1" height="300" style="width: 100%;">
    </div>

  </div>

  <div class="row" style="margin-top: 20px;">
  <h4 style="text-align: left;">HISTORIA DE NUESTRA ESCUELA..</h4>
    <p>En la planta urbana, ubicada en la manzana N°36 se halla la escuela N°130,"25 de Mayo", fundada el 25 de abril de 1927 y su primera directora fue la señora Mercedes Horve
    de Vigil.
    Contaba por entonces con 4 salones y la casa habitacion que habitaba la Sra Directora. Las Clases se dictaban en 2 turnos. Los muebles que formaban el inventario eran 
    de los bancos, una biblioteca y algunos pizarrones, que no alcanzaban a satisfacer las necesidades de los alumnos, habiendo en ese año 158.
    Desde los Comienzos se habia formado una comision  de padres que colaboraban con rifas para el mantenimiento y ampliacion de la escuela.
    </p>
  </div>
  <div class="row" style="margin-top: 20px;">
  <h4 style="text-align: left;">LA ESCUELA HOY EN DIA..</h4>
    <p>
     La escuela cuenta con 144 alumnos , 8  salones, un patio cubierto. La casa habitacion es utilizada para la enseñanza aprendizaje de los alumnos. se cuenta con un 
    laboratorio, donde los mismos desarrollan distintas actividades.
    Los miembros de la cooperadora como aquel entonces luchan por el bienestar de los alumnos organizando distintos eventos.
    La fiesta tradicional de la escuela se realiza el dia "25 de mayo" de cada año. 
    </p>
  </div>
</div>

<div class="col-lg-8 col-lg-offset-2" style="margin-top: 50px;">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>

      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="img/esc2.jpg" alt="escuela2" height="350" style="width: 100%;">
          <div class="carousel-caption">
            
          </div>
        </div>
        <div class="item">
        <img src="img/esc1.jpg" alt="escuela1" height="555" width="555" style="margin-right: 10px;margin-left: 190px;margin-top:10px ;margin-bottom:10px ;">
          <div class="carousel-caption">
     
          </div>
        </div>
             <div class="item">
          <img src="img/esc4.png" alt="escuela4" height="300" style="width: 85%;margin-left: 65px">
          <div class="carousel-caption">
     
          </div>
        </div>
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Atras</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
      </a>
  </div>
</div>

<div class="clearfooter"></div>


<?php
  include("zfooter.php");
 ?>

	<script src="js/jquery-1.12.2.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>
