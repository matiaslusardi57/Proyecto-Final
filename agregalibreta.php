<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");


  $docente = recuperar_docente($_SESSION['usuario']);

 ?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Alumnos Año</title>
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
 <br>
 <?php
$nm=$_GET["Grado_Nro_grado"];
$cm=$_GET["Cod_materia"];
$dd=$docente['DNI_docente'];
$mg=recuperar_materia($cm);
?>



 <div class="row">
 <div style="text-align:center;">

<h1><?php echo $docente['NombreApellido'] ?></h1>
</div>
</div>
    <div style="text-align:center;">
<h2>Listado de alumnos de:  <?php echo $nm ?>°  -  <?php echo $mg['Descripcion'] ?></h2>
</div>
            <div class="row">
                <div class="col-lg-12">
                             <table class="table table-striped table-bordered table-hover" id="dataTables-addControls">
                                    <thead>
                                        <tr>
                                         
                                            <th style="text-align:center;" class="col-lg-1">DNI</th>
                                            <th style="text-align:center;" class="col-lg-2">Nombre y Apellido</th>
                                            <th style="text-align:center;" class="col-lg-3">Notas Primer Trimestre</th>
                                            <th style="text-align:center;" class="col-lg-3">Notas Segundo Trimestre</th>
                                            <th style="text-align:center;" class="col-lg-3">Notas Tercer Trimestre</th>                              
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 

$z=$docente['DNI_docente'];

$sql = "select DISTINCT a.`DNI_Alumno`, a.`NombreApellido`, l.`N1`, l.`N2`, l.`N3`, m.`Cod_materia`
FROM `alumno` a
INNER join `grado` g
on a.`Grado_Nro_Grado` = g.`Nro_grado`
INNER join `materia` m
on m.`Grado_Nro_Grado` = g.`Nro_grado`
LEFT join `libreta` l 
on l.`Cod_materia`=m.`Cod_materia` and a.`DNI_Alumno`=l.`DNI_Alumno`
WHERE m.`Grado_Nro_Grado`= $nm and m.`Cod_materia`= $cm 
ORDER BY `m`.`Grado_Nro_grado`  ASC";



$rs = mysqli_query($db, $sql);
if ( $rs ) {
  while ($r = mysqli_fetch_array($rs) ) {
?>
                                        <tr>
                     
                                          <td><?php  echo $r["DNI_Alumno"]; ?></td>
                                          <td><?php  echo $r["NombreApellido"]; ?></td>
                                          <td style="text-align: center;"><?php  echo $r["N1"]; ?></td>
                                          <td style="text-align: center;"><?php  echo $r["N2"]; ?></td>
                                          <td style="text-align: center;"><?php  echo $r["N3"]; ?></td>
                                
                       
                                         </tr>
<?php 
  }
}
?>
                                    </tbody>
                                </table>
                </div>
            </div>







<!-- primer modal !-->


<div class="modal fade col-lg-8 col-sm-offset-2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="notas1">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form class="form-horizontal" name="form1" method="post" action="altalibreta.php?Cod_materia=<?php echo "$cm"?>&Grado_Nro_grado=<?php echo "$nm" ?>" autocomplete="off">
         <div style="text-align:center;margin-top: 50px;">
         <h4>Cargue las Notas del Primer Trimestre</h4>
        </div>
              <div class="col-lg-12">
                             <table class="table table-striped table-bordered table-hover" id="dataTables-addControls">
                                    <thead>
                                        <tr>
                                         
                                            <th style="text-align:center;" class="col-lg-1">DNI</th>
                                            <th class="hidden">Dni</th>
                                            <th class="hidden">Codigo materia</th>
                                            <th style="text-align:center;" class="col-lg-2">Nombre y Apellido</th>
                                            <th style="text-align:center;" class="col-lg-3">Notas</th>
                                            <th class="hidden">N2</th>
                                            <th class="hidden">N3</th>                             
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 

$z=$docente['DNI_docente'];

$sql = "select DISTINCT a.`DNI_Alumno`, a.`NombreApellido`, l.`N1`, l.`N2`, l.`N3`, m.`Cod_materia`
FROM `alumno` a
INNER join `grado` g
on a.`Grado_Nro_Grado` = g.`Nro_grado`
INNER join `materia` m
on m.`Grado_Nro_Grado` = g.`Nro_grado`
LEFT join `libreta` l 
on l.`Cod_materia`=m.`Cod_materia` and a.`DNI_Alumno`=l.`DNI_Alumno`
WHERE m.`Grado_Nro_Grado`= $nm and m.`Cod_materia`= $cm 
ORDER BY `m`.`Grado_Nro_grado`  ASC";

$rs = mysqli_query($db, $sql);
if ( $rs ) {
  while ($r = mysqli_fetch_array($rs) ) {
?>
                                        <tr>
                                          <td><?php  echo $r["DNI_Alumno"]; ?></td>
                                          <td class="hidden">
                                            <input type="text" name="dni[]" value="<?php  echo $r["DNI_Alumno"]; ?>">
                                          </td>
                                          <td class="hidden">
                                            <input type="text" name="cod_materia[]" value="<?php  echo $r["Cod_materia"]; ?>">
                                          </td>
                                          <td><?php  echo $r["NombreApellido"]; ?></td>
                                          <td style="text-align: center;">
                                           <input style="text-align: center;" type="number" min="0" max="10" required="true" name="nota1[]" value="<?php  echo $r["N1"]; ?>"> 
                                          </td>
                                          <td class="hidden"><?php  echo $r["N2"]; ?></td>
                                          <td class="hidden"><?php  echo $r["N3"]; ?></td>
                                         </tr>
<?php 
  }
}
?>
                                    </tbody>
                                </table>
                </div>
          <div class="form-group" style="margin-top: 40px;margin-bottom: 30px;">
            <div class="col-lg-2 col-sm-offset-4">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
            <div class="col-lg-2">
              <button type="submit" class="btn btn-success">Confirmar</button>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>



<!-- segundo modal !-->


<div class="modal fade col-lg-8 col-sm-offset-2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="notas2">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form class="form-horizontal" name="form1" method="post" action="altalibreta.php?Cod_materia=<?php echo "$cm"?>&Grado_Nro_grado=<?php echo "$nm" ?>" autocomplete="off">
         <div style="text-align:center;margin-top: 50px;">
         <h4>Cargue las Notas del Segundo Trimestre</h4>
        </div>
              <div class="col-lg-12">
                             <table class="table table-striped table-bordered table-hover" id="dataTables-addControls">
                                    <thead>
                                        <tr>
                                         
                                            <th style="text-align:center;" class="col-lg-1">DNI</th>
                                            <th class="hidden">Dni</th>
                                            <th class="hidden">Codigo materia</th>
                                            <th style="text-align:center;" class="col-lg-2">Nombre y Apellido</th>
                                            <th class="hidden">N1</th>
                                            <th style="text-align:center;" class="col-lg-3">Notas</th>
                                            <th class="hidden">N3</th>                             
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 

$z=$docente['DNI_docente'];

$sql = "select DISTINCT a.`DNI_Alumno`, a.`NombreApellido`, l.`N1`, l.`N2`, l.`N3`, m.`Cod_materia`
FROM `alumno` a
INNER join `grado` g
on a.`Grado_Nro_Grado` = g.`Nro_grado`
INNER join `materia` m
on m.`Grado_Nro_Grado` = g.`Nro_grado`
LEFT join `libreta` l 
on l.`Cod_materia`=m.`Cod_materia` and a.`DNI_Alumno`=l.`DNI_Alumno`
WHERE m.`Grado_Nro_Grado`= $nm and m.`Cod_materia`= $cm 
ORDER BY `m`.`Grado_Nro_grado`  ASC";

$rs = mysqli_query($db, $sql);
if ( $rs ) {
  while ($r = mysqli_fetch_array($rs) ) {
?>
                                        <tr>
                                          <td><?php  echo $r["DNI_Alumno"]; ?></td>
                                          <td class="hidden">
                                            <input type="text" name="dni[]" value="<?php  echo $r["DNI_Alumno"]; ?>">
                                          </td>
                                          <td class="hidden">
                                            <input type="text" name="cod_materia[]" value="<?php  echo $r["Cod_materia"]; ?>">
                                          </td>
                                          <td><?php  echo $r["NombreApellido"]; ?></td>   
                                          <td class="hidden"><?php  echo $r["N1"]; ?></td>
                                          <td style="text-align: center;">
                                           <input style="text-align: center;" type="number" min="0" max="10" required="true" name="nota2[]" value="<?php  echo $r["N2"]; ?>"> 
                                          </td>
                                          <td class="hidden"><?php  echo $r["N3"]; ?></td>
                                         </tr>
<?php 
  }
}
?>
                                    </tbody>
                                </table>
                </div>
          <div class="form-group" style="margin-top: 40px;margin-bottom: 30px;">
            <div class="col-lg-2 col-sm-offset-4">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
            <div class="col-lg-2">
              <button type="submit" class="btn btn-success">Confirmar</button>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>




<!-- tercer modal !-->


<div class="modal fade col-lg-8 col-sm-offset-2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="notas3">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form class="form-horizontal" name="form1" method="post" action="altalibreta.php?Cod_materia=<?php echo "$cm"?>&Grado_Nro_grado=<?php echo "$nm" ?>" autocomplete="off">
         <div style="text-align:center;margin-top: 50px;">
         <h4>Cargue las Notas del Tercer Trimestre</h4>
        </div>
              <div class="col-lg-12">
                             <table class="table table-striped table-bordered table-hover" id="dataTables-addControls">
                                    <thead>
                                        <tr>
                                         
                                            <th style="text-align:center;" class="col-lg-1">DNI</th>
                                            <th class="hidden">Dni</th>
                                            <th class="hidden">Codigo materia</th>
                                            <th style="text-align:center;" class="col-lg-2">Nombre y Apellido</th>
                                            <th class="hidden">N1</th>
                                            <th class="hidden">N2</th>
                                            <th style="text-align:center;" class="col-lg-3">Notas</th>                             
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 

$z=$docente['DNI_docente'];

$sql = "select DISTINCT a.`DNI_Alumno`, a.`NombreApellido`, l.`N1`, l.`N2`, l.`N3`, m.`Cod_materia`
FROM `alumno` a
INNER join `grado` g
on a.`Grado_Nro_Grado` = g.`Nro_grado`
INNER join `materia` m
on m.`Grado_Nro_Grado` = g.`Nro_grado`
LEFT join `libreta` l 
on l.`Cod_materia`=m.`Cod_materia` and a.`DNI_Alumno`=l.`DNI_Alumno`
WHERE m.`Grado_Nro_Grado`= $nm and m.`Cod_materia`= $cm 
ORDER BY `m`.`Grado_Nro_grado`  ASC";

$rs = mysqli_query($db, $sql);
if ( $rs ) {
  while ($r = mysqli_fetch_array($rs) ) {
?>
                                        <tr>
                                          <td><?php  echo $r["DNI_Alumno"]; ?></td>
                                          <td class="hidden">
                                            <input type="text" name="dni[]" value="<?php  echo $r["DNI_Alumno"]; ?>">
                                          </td>
                                          <td class="hidden">
                                            <input type="text" name="cod_materia[]" value="<?php  echo $r["Cod_materia"]; ?>">
                                          </td>
                                          <td><?php  echo $r["NombreApellido"]; ?></td>
                                          <td class="hidden"><?php  echo $r["N1"]; ?></td>
                                          <td class="hidden"><?php  echo $r["N2"]; ?></td>
                                          <td style="text-align: center;">
                                           <input style="text-align: center;" type="number" min="0" max="10" required="true" name="nota3[]" value="<?php  echo $r["N3"]; ?>"> 
                                          </td>
                                         </tr>
<?php 
  }
}
?>
                                    </tbody>
                                </table>
                </div>
          <div class="form-group" style="margin-top: 40px;margin-bottom: 30px;">
            <div class="col-lg-2 col-sm-offset-4">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
            <div class="col-lg-2">
              <button type="submit" class="btn btn-success">Confirmar</button>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>


<!-- Fin Modales !-->


   <div class="row" style="margin:20px 0;">
      <div class="col-lg-3">
      <a href="abmlibreta.php" role="button" class="btn btn-primary btn-block"> 
        <p style="margin: 3px 0;">Volver</p>
      </a>
    </div>
    <div class="col-lg-3">
     <a href="#notas1" role="button" class="btn btn-success btn-block" data-toggle="modal">
      <p style="margin: 3px 0;">Editar 1° Trimestre</p>
      </a>
    </div>
     <div class="col-lg-3">
      <a href="#notas2" role="button" class="btn btn-success btn-block" data-toggle="modal"> 
        <p style="margin: 3px 0;">Editar 2° Trimestre</p>
      </a>
    </div>
     <div class="col-lg-3">
      <a href="#notas3" role="button" class="btn btn-success btn-block" data-toggle="modal"> 
        <p style="margin: 3px 0;">Editar 3° Trimestre</p>
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