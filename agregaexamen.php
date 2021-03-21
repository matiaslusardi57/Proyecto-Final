<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");


$docente = recuperar_docente($_SESSION['usuario']);

 ?>
 <!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Exámenes</title>
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
  <script language=javascript>
  function ventanasecundaria (idExamen) {
    window.open("veronline.php?idExamen=" + idExamen);
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
 
<?php if(isset($_GET["e"])) { ?> 

 <?php
$nm=$_GET["Grado_Nro_grado"];
$cm=$_GET["Cod_materia"];
$dd=$docente['DNI_docente'];
$mg=recuperar_materia($cm);
  
if (isset($_POST["nro2"])) {
  $n=$_POST["nro2"];
  $f=$_POST["fecha2"];
  $d=$_POST["contenido2"];
  $c=$_POST["correccion2"];
  $z=$_POST["grado2"];
  $m=$_POST["codigo2"];


$consulta="insert into `examen` (`Numero`,`Fecha_examen`,`Descripcion`,`Nota`,`examen_grado`,`Materia_Cod_materia`) values ('$n','$f','$d','$c','$z','$m')";

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
    <div style="text-align:center;">
<h2><?php echo $nm ?>°  -  <?php echo $mg['Descripcion'] ?>  - Examen</h2>
</div>
<br>
<div class="row" style="margin-top: 20px; text-align:center;">
      <?php echo "<p style='color:red;'>* Error al subir el archivo, solo extensiones PDF</p>"; ?> 
</div>
            <div class="row">
                <div class="col-lg-12">
                             <table class="table table-striped table-bordered table-hover" id="dataTables-addControls" style="text-align:center;">
                                    <thead>
                                        <tr>
                                         
                                            <th style="text-align: center;">Nro.</th>
                                            <th style="text-align: center;">Fecha de Examen</th>
                                            <th style="text-align: center;">Temas</th>
                                            <th style="text-align: center;">Nota</th>
                                            <th style="text-align: center;">Acciones</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$sql = "select distinct e.`idExamen`,e.`Numero`,e.`Fecha_examen`,e.`Descripcion`,e.`Nota`,e.`examen_grado`,e.`Materia_Cod_materia`
from `examen`e
inner join `materia`m
on e.`Materia_Cod_materia`=m.`Cod_materia`
inner join `grado`g
on m.`Grado_Nro_grado`= g.`Nro_grado`
inner join `vinculo` v
on g.`Nro_grado`= v.`Grado_Nro_grado`
inner join `docente`d
on v.`Docente_DNI_docente`= d.`DNI_docente`
where e.`Materia_Cod_materia`=$cm and e.`examen_grado`=$nm and v.`Docente_DNI_docente`=$dd";

$rs = mysqli_query($db, $sql);
if ( $rs ) {
  while ($r = mysqli_fetch_array($rs) ) {
?>
                                        <tr>
                     
                                          <td><?php  echo $r["1"]; ?></td>
                                          <td><?php  echo $r["2"]; ?></td>
                                          <td style="width: 400px;"><?php  echo $r["3"]; ?></td>
                                          <td>
                                            <a href="javascript:ventanasecundaria('<?php echo $r["idExamen"]; ?>')"><?php echo $r["4"]; ?></a>
                                            <form method="post" action="procesararchivo.php?idExamen=<?php echo $r["idExamen"]; ?>&Grado_Nro_grado=<?php echo $nm; ?>&Cod_materia=<?php echo $cm; ?>" enctype="multipart/form-data">
                                              <input name="archivo" REQUIRED type="file"  /><br>
                                              <input type="submit" class="btn btn-success" value="Guardar"/>
                                            </form>
                                          </td>
                                          <td>
                                          <button type="button" class="btn btn-warning" onClick="editarexamen(<?php echo $r["idExamen"].','.$cm.','.$nm ?>)" style="margin:auto auto;">Editar</button>
                                          <button type="button" class="btn btn-danger" onClick="borraexamen(<?php echo $r["idExamen"].','.$cm.','.$nm ?>)" style="margin:auto auto;">Borrar</button>
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
         <button type="button" class="btn btn-success btn-lg btn-block" onClick="agregae(<?php echo $cm.','.$nm; ?>)">Agregar Otro</button>
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


<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- DataTables JavaScript -->
<script src="js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>






    <script>

    

  function borraexamen(idExamen,Cod_materia,Grado_Nro_grado) {
    location.href = "xxexamen.php?idExamen=" + idExamen + "&Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;
  }

  function editarexamen(idExamen,Cod_materia,Grado_Nro_grado) {
    location.href = "editexamen.php?idExamen=" + idExamen + "&Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;
  }
   function agregae(Cod_materia,Grado_Nro_grado) {
    location.href = "unexamenok.php?Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;
  }

  
    </script>




 
  <div class="clearfooter"></div>
  </div>

<?php
  include("zfooter.php");
 ?>

<?php }

else {  ?>
 
 <?php
$nm=$_GET["Grado_Nro_grado"];
$cm=$_GET["Cod_materia"];
$dd=$docente['DNI_docente'];
$mg=recuperar_materia($cm);
  
if (isset($_POST["nro2"])) {
  $n=$_POST["nro2"];
  $f=$_POST["fecha2"];
  $d=$_POST["contenido2"];
  $c=$_POST["correccion2"];
  $z=$_POST["grado2"];
  $m=$_POST["codigo2"];


$consulta="insert into `examen` (`Numero`,`Fecha_examen`,`Descripcion`,`Nota`,`examen_grado`,`Materia_Cod_materia`) values ('$n','$f','$d','$c','$z','$m')";

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
    <div style="text-align:center;">
<h2><?php echo $nm ?>°  -  <?php echo $mg['Descripcion'] ?>  - Examen</h2>
</div><br>
            <div class="row">
                <div class="col-lg-12">
                             <table class="table table-striped table-bordered table-hover" id="dataTables-addControls" style="text-align:center;">
                                    <thead>
                                        <tr>
                                         
                                            <th style="text-align: center;">Nro.</th>
                                            <th style="text-align: center;">Fecha de Examen</th>
                                            <th style="text-align: center;">Temas</th>
                                            <th style="text-align: center;">Nota</th>
                                            <th style="text-align: center;">Acciones</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$sql = "select distinct e.`idExamen`,e.`Numero`,e.`Fecha_examen`,e.`Descripcion`,e.`Nota`,e.`examen_grado`,e.`Materia_Cod_materia`
from `examen`e
inner join `materia`m
on e.`Materia_Cod_materia`=m.`Cod_materia`
inner join `grado`g
on m.`Grado_Nro_grado`= g.`Nro_grado`
inner join `vinculo` v
on g.`Nro_grado`= v.`Grado_Nro_grado`
inner join `docente`d
on v.`Docente_DNI_docente`= d.`DNI_docente`
where e.`Materia_Cod_materia`=$cm and e.`examen_grado`=$nm and v.`Docente_DNI_docente`=$dd";

$rs = mysqli_query($db, $sql);
if ( $rs ) {
  while ($r = mysqli_fetch_array($rs) ) {
?>
                                        <tr>
                     
                                          <td><?php  echo $r["1"]; ?></td>
                                          <td><?php  echo $r["2"]; ?></td>
                                          <td style="width: 400px;"><?php  echo $r["3"]; ?></td>
                                          <td>
                                            <a href="javascript:ventanasecundaria('<?php echo $r["idExamen"]; ?>')"><?php echo $r["4"]; ?></a>
                                            <form method="post" action="procesararchivo.php?idExamen=<?php echo $r["idExamen"]; ?>&Grado_Nro_grado=<?php echo $nm; ?>&Cod_materia=<?php echo $cm; ?>" enctype="multipart/form-data">
                                              <input name="archivo" REQUIRED type="file"  /><br>
                                              <input type="submit" class="btn btn-success" value="Guardar"/>
                                            </form>
                                          </td>
                                          <td>
                                          <button type="button" class="btn btn-warning" onClick="editarexamen(<?php echo $r["idExamen"].','.$cm.','.$nm ?>)" style="margin:auto auto;">Editar</button>
                                          <button type="button" class="btn btn-danger" onClick="borraexamen(<?php echo $r["idExamen"].','.$cm.','.$nm ?>)" style="margin:auto auto;">Borrar</button>
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
         <button type="button" class="btn btn-success btn-lg btn-block" onClick="agregae(<?php echo $cm.','.$nm; ?>)">Agregar Otro</button>
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


<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- DataTables JavaScript -->
<script src="js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>






    <script>

    

  function borraexamen(idExamen,Cod_materia,Grado_Nro_grado) {
    location.href = "xxexamen.php?idExamen=" + idExamen + "&Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;
  }

function editarexamen(idExamen,Cod_materia,Grado_Nro_grado) {
    location.href = "editexamen.php?idExamen=" + idExamen + "&Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;
  }
   function agregae(Cod_materia,Grado_Nro_grado) {
    location.href = "unexamenok.php?Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;
  }

  
    </script>





 
  <div class="clearfooter"></div>
  </div>

<?php
  include("zfooter.php");
 ?>

<?php } ?>

     <script src="js/jquery-1.12.2.js"></script>
     <script src="js/bootstrap.min.js"></script>  
     <script src="js/jquery-ui.js"></script> 
     <link rel="stylesheet" href="js/themes/smoothness/jquery-ui.css">
     
     <script src="js/jquery-1.12.2.js"></script>
     <script src="js/bootstrap.min.js"></script>	
 </body>
</html>