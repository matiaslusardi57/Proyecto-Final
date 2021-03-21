<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");


$docente = recuperar_docente($_SESSION['usuario']);

$grado = $_GET['Grado_Nro_grado'];

 ?><!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Comunicados</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css"> 
  <link rel="stylesheet" type="text/css" href="estilo.css">
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

<div class="container">
 
 <?php
if (isset($_POST["nro7"])) {
  $n=$_POST["nro7"];
  $f=$_POST["fecha7"];
  $d=$_POST["contenido7"];
  $cc=$_POST["docente7"];
  $z=$_POST["grado"];


$consulta="insert into `comunicado` (`Numero`,`Descripcion`,`Fecha`,`Docente`,`Grado_Nro_grado`) values ('$n','$d','$f','$cc','$z')";

$resultado=mysqli_query($db,$consulta);
} 
 ?>
 <br>
 <div class="row">
 <div style="text-align:center;">
<h1><?php echo $docente['NombreApellido'] ?></h1>
</div>
</div>
<div class="caja3">

<h1 style="text-align:center;">Comunicados <?php echo $grado; ?>° Grado</h1>

<?php

$mate=" SELECT `Numero`, `Descripcion`, `Fecha`, `Docente`, `idOtro`
        FROM `grado` 
        inner join `comunicado`
        on `Nro_grado`=`Grado_Nro_grado`
        WHERE `Nro_grado`='$grado'
      ";

$resul=mysqli_query($db, $mate);

?>
            <div class="row">
                <div class="col-lg-12">
                             <table class="table table-striped table-bordered table-hover" id="dataTables-addControls">
                                    <thead>
                                        <tr>
                                         
                                            <th style="text-align: center;">Nro.</th>
                                            <th style="text-align: center;">Temática</th>
                                            <th style="text-align: center;">Fecha</th>
                                            <th style="text-align: center;">Docente</th>
                                            <th style="text-align: center;">Borrar</th>
                                        
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 

if ( $resul ) {
  while ($r = mysqli_fetch_array($resul) ) {
?>
                                        <tr>
                     
                                          <td><?php  echo $r["Numero"]; ?></td>
                                          <td><?php  echo $r["Descripcion"]; ?></td>
                                          <td><?php  echo $r["Fecha"]; ?></td>
                                          <td><?php  echo $r["Docente"]; ?></td>
                                          <td style="text-align: center;">                                                                                                                                 
                                          <button type="button" class="btn btn-danger" onClick="borraotro(<?php echo $r["idOtro"] .','."$grado" ?>)" style="margin:0 5px;">Borrar</button>
                                          
                                          </td>
                       
                    </tr>
<?php 
  }
}
?>
                                    </tbody>
                                </table>
                </div>
            </div>
                 <div class="row"> 
         <div class="col-sm-offset-2 col-lg-8">
         <button type="button" class="btn btn-success btn-lg btn-block" onClick="agregaotr(<?php echo "$grado" ?>)" style="margin:0 5px;">Agregar Otro</button>
         </div>
         </div>  
         <div class="row" style="margin:20px 0;">
          <div class="col-lg-offset-5 col-lg-2">
           <a href="catedras.php" role="button" class="btn btn-primary btn-sm btn-block"> 
            <p style="margin: 3px 0;">Volver</p>
           </a>
          </div>
         </div>
        
    </div>

    <script>

  function borraotro(idOtro,Nro_grado) {
    location.href = "xxotro.php?idOtro=" + idOtro + "&Nro_grado=" + Nro_grado;
  }

function agregaotr(Nro_grado) {
    location.href = "otrook.php?Grado_Nro_grado=" + Nro_grado;
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