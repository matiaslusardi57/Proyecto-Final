<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");

$admin = recuperar_admin($_SESSION['usuario']);

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Verificar Firma</title>
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
 <br>
<div class="container">
  <div class="row" style="text-align: center;">
    <h2>Listado de firmas y Avisos</h2>
  </div>

<div class="container">
  <br>
   <?php 
             $sql0 =  "SELECT DISTINCT `Nro_grado` FROM `grado`" ;
                $rs0 = mysqli_query($db, $sql0);
              if ( $rs0 ) {
                while ($r0 = mysqli_fetch_array($rs0) ) {
  ?>


  
    <div class="panel-group" id="accordion" role="tablist">
      <div class="panel panel-primary">
        <div class="panel-heading" rol="tab" id="heading1">
          <h4 class="panel-title">
            <a href="#<?php  echo $r0["Nro_grado"]; ?>" data-toggle="collapse" data-parent="#accordion">
               Alumnos de <?php  echo $r0["Nro_grado"];
                        $Nro = $r0["Nro_grado"];
                       ?>°
            </a>
          </h4>
        </div>
        <div id="<?php  echo $r0["Nro_grado"]; ?>" class="panel-collapse collapse">
          <div class="panel-body">
               <?php 
                  $sql = "SELECT a.`NombreApellido`, p.`firma1`, p.`firma2`, p.`firma3`, a.`DNI_Alumno`
                          FROM `alumno` a
                          left join `alumno/padre` p
                          on a.`DNI_Alumno` = p.`Alumno_DNI_Alumno`
                          WHERE `Grado_Nro_grado` = $Nro
                          ORDER BY `NombreApellido`";
                  $rs = mysqli_query($db, $sql);
                  if ( $rs ) {
                    while ($r = mysqli_fetch_array($rs) ) {
                      if (($r["firma1"]==0) or !isset($r["firma1"])) {
                        $firma1="NO";
                      } elseif (($r["firma1"]==1)) {
                        $firma1="SI &nbsp;";
                      }
                      if (($r["firma2"]==0) or !isset($r["firma2"])) {
                        $firma2="NO";
                      } elseif (($r["firma2"]==1)) {
                        $firma2="SI &nbsp;";
                      }
                      if (($r["firma3"]==0) or !isset($r["firma3"])) {
                        $firma3="NO";
                      } elseif (($r["firma3"]==1)) {
                        $firma3="SI";
                      }
                      $dniAlumno = $r["DNI_Alumno"];

                      $sql30 = "select alu.`DNI_Alumno`, COUNT(a.`Descripcion`)
                                from `alumno`alu 
                                LEFT join `avisos`a
                                on a.`Alumno_DNI_Alumno`= alu.`DNI_Alumno`
                                where alu.`DNI_Alumno` = $dniAlumno
                                GROUP by alu.`DNI_Alumno`";
                       $rs30 = mysqli_query($db, $sql30);
                       $r30 = mysqli_fetch_array($rs30);
                  ?>
                  <div class="row">
                    <div class="col-lg-3">
                    <span> Alumno:</span> <?php  echo $r["NombreApellido"]; ?>
                    </div>
                    <div class="col-lg-9">
                    <span> Firma Primer Trimestre: </span><?php  echo $firma1; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span> Firma Segundo Trimestre: </span> <?php  echo $firma2; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span> Firma Tercer Trimestre: </span> <?php  echo $firma3; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     Cantidad de Avisos:<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><?php  echo $r30[1]; ?></b> </span> 
                    </div>
                  </div>
                   <hr>
      <?php 
                  }
                }
                ?>
          </div>
        </div>
      </div>
    </div>
    
  <?php 

                }
              }
 ?>


</div>


  <div class="row" style="margin:20px 0;">
    <div class="col-lg-offset-5 col-lg-2">
      <a href="libretasGenerales.php" role="button" class="btn btn-primary btn-sm btn-block"> 
        <p style="margin: 3px 0;">Volver</p>
      </a>
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