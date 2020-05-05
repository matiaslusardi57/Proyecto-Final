<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");


$docente = recuperar_docente($_SESSION['usuario']);

 ?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Agrega Aviso</title>
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
if (isset($_POST["nro6"])) {
  $n=$_POST["nro6"];
  $f=$_POST["fecha6"];
  $d=$_POST["contenido6"];
  $cc=$_POST["docente6"];
  $z=$_POST["alumno6"];


$consulta="insert into `avisos` (`Numero`,`Descripcion`,`Fecha`,`Docente`,`Alumno_DNI_Alumno`) values ('$n','$d','$f','$cc','$z')";

$resultado=mysqli_query($db,$consulta);
} 
 ?>



<br>
 <div class="row">
 <div style="text-align:center;">
<h1><?php echo $docente['NombreApellido'] ?></h1>
</div>
</div>

<?php
$c=$_GET["DNI_Alumno"];
$mate="select a.`NombreApellido` from `alumno`a where a.`DNI_Alumno`=$c";

$resul=mysqli_query($db, $mate);

    
while (($fila=mysqli_fetch_row($resul))==true) {


 ?>

    <div class="caja3">
  <br>
  <div style="text-align:center;">
<h4> Avisos    /   <?php echo $fila[0] ?></h4>
</div>

<?php 
;
}
?>
            <div class="row">
                <div class="col-lg-12">
                             <table class="table table-striped table-bordered table-hover" id="dataTables-addControls">
                                    <thead>
                                        <tr>
                                         
                                            <th style="text-align: center;">Nro</th>
                                            <th style="text-align: center;">Sobre</th>
                                            <th style="text-align: center;">Fecha</th>
                                            <th style="text-align: center;">Docente</th>
                                            <th style="text-align: center;">Borrar</th>
                                        
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 

$sql = "select distinct a.`idAvisos`,a.`Numero`,a.`Descripcion`,a.`Fecha`,a.`Docente`,a.`Alumno_DNI_Alumno`
from `avisos`a
inner join `alumno`al
on a.`Alumno_DNI_Alumno`= al.`DNI_Alumno`
where al.`DNI_Alumno`=$c";

$rs = mysqli_query($db, $sql);
if ( $rs ) {
  while ($r = mysqli_fetch_array($rs) ) {
?>
                                        <tr>
                     
                                          <td><?php  echo $r["1"]; ?></td>
                                          <td><?php  echo $r["2"]; ?></td>
                                          <td><?php  echo $r["3"]; ?></td>
                                          <td><?php  echo $r["4"]; ?></td>
                                          <td style="text-align: center;">                                                                                                                                 
                                          <button type="button" class="btn btn-danger" onClick="borraaviso(<?php echo $r["idAvisos"].','."$c" ?>)" style="margin:0 5px;">Borrar</button>
                                          
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
         <button type="button" class="btn btn-primary btn-lg btn-block" onClick="agregaavi(<?php echo "$c" ?>)" style="margin:0 5px;">Agregar Otro</button>
         </div>
         </div> 
          <div class="row" style="margin:20px 0;">
            <div class="col-lg-offset-5 col-lg-2">
             <a href="buscaf.php" role="button" class="btn btn-default btn-lg btn-block"> 
              <p style="margin: 3px 0;">Volver</p>
             </a>
            </div>
          </div>
    </div>

    <script>

  function borraaviso(idAvisos,DNI_Alumno) {
    location.href = "xxaviso.php?idAvisos=" + idAvisos + "&DNI_Alumno=" + DNI_Alumno;
  }

function agregaavi(DNI_Alumno) {
    location.href = "unavisook.php?DNI_Alumno=" + DNI_Alumno;
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