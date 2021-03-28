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
  <title>Notas por Grado</title>
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
    <h2>Notas De las Libretas</h2>
  </div>

  <?php if (isset($_GET["nombre"])) { 
    $nombre = $_GET["nombre"];
   ?>
  <p style="color: green; margin-top: 20px; font-size: 20px; text-align: center;"><b><?php  echo   "Las notas del alumno $nombre han sido publicadas con éxito ";?></b><p>
  <?php } ?>

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
                  $sql = "SELECT a.`NombreApellido`, a.`DNI_Alumno`
                          FROM `alumno` a
                          INNER join `grado` g
                          on a.`Grado_Nro_Grado` = g.`Nro_grado`
                          WHERE `Grado_Nro_grado` = $Nro
                          ORDER BY `NombreApellido`";
                  $rs = mysqli_query($db, $sql);
                  if ( $rs ) {
                    while ($r = mysqli_fetch_array($rs) ) {
                   $alumno = $r["DNI_Alumno"];
                   
                  ?>
                  <div class="row">
                    <div class="col-lg-3">
                    <span> Alumno:</span> <?php  echo $r["NombreApellido"]; ?>
                
                    </div>
                                    
                  
               <div class="col-lg-4 col-lg-offset-1">
                    <!-- Large modal -->
                    <a href="#ventana<?php  echo $r["DNI_Alumno"] ?>" role="button" class="btn btn-success btn-sm btn-block" data-toggle="modal"><p style="margin: 3px 0;">Notas</p>
                    </a>
                  </div>

                  <div class="modal fade col-lg-8 col-sm-offset-2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="ventana<?php  echo $r["DNI_Alumno"] ?>">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form class="form-horizontal" name="form1" method="post" action="altaConfirmaLibreta.php" autocomplete="off">

        <?php
$consulta="SELECT m.`Descripcion`, l.`N1`, l.`N2`, l.`N3`
FROM `materia` m
inner JOIN `alumno` a
on m.`Grado_Nro_grado` = a.`Grado_Nro_grado`
left JOIN `libreta` l
on a.`DNI_Alumno` = l.`DNI_Alumno` and m.`Cod_materia` = l.`Cod_materia`
WHERE a.`DNI_Alumno` = $alumno";
$resultado=mysqli_query($db, $consulta);
?>
<div class="container">
  <div class="table table-bordered">
    <table class="table">
      <tr>
        <td class="active col-lg-3"><label style="text-align: left;"><h4>Asignaturas</h4></label></td>
        <td class="active col-lg-2" style="text-align: center;"><label><h4>1° Trimestre</h4></label></td>
        <td class="active col-lg-2" style="text-align: center;"><label><h4>2° Trimestre</h4></label></td>
        <td class="active col-lg-2" style="text-align: center;"><label><h4>3° Trimestre</h4></label></td>
        <td class="active col-lg-3" style="text-align: center;"><label><h4>Promedio</h4></label></td>
      </tr>

      <tr>
        <div class="row">
          <?php
            $promedio_gral = 0;
            $cont = 0;
            while (($fila=mysqli_fetch_row($resultado))==true) {
              $promedio = ($fila[1] + $fila[2] + $fila[3]);
              $promedio_gral = $promedio_gral + $promedio;
              $promedio = $promedio/3;
              $cont = $cont + 1;
          ?>
          <th class="warning"><?php echo $fila[0]?></th>
          <th class="warning" style="text-align: center;"><?php echo $fila[1]?></th>
          <th class="warning" style="text-align: center;"><?php echo $fila[2]?></th>
          <th class="warning" style="text-align: center;"><?php echo $fila[3]?></th>
          <th class="warning" style="text-align: center;"><?php echo $promedio?></th>            
      </tr>
      <?php 
        ;}
         $promedio_gral =  $promedio_gral/$cont; 
      ?>
    </table>
     <div class="hidden">
        <input type="number" name="dni" value="<?php  echo $r["DNI_Alumno"]; ?>">
        <input type="text" name="nombre" value="<?php  echo $r["NombreApellido"]; ?>">
     </div>

  </div>
</div>
           
          <div class="form-group" style="margin-top: 40px;margin-bottom: 30px;">
            <div class="col-lg-2 col-sm-offset-4">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
            <div class="col-lg-2">
              <button type="submit" class="btn btn-success">Publicar Notas</button>
            </div>
          </div>
        </form>
    </div>
  </div>
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