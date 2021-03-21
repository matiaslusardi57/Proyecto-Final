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
	<title>Tareas</title>
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
  function ventanasecundaria (idTareas) {
    window.open("veronlinetarea.php?idTareas=" + idTareas);
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


<?php if(isset($_GET["a"])) { ?> 
  
 <?php
$nm=$_GET["Grado_Nro_grado"];
$cm=$_GET["Cod_materia"];
$dd=$docente['DNI_docente'];
$mg=recuperar_materia("$cm");

if (isset($_POST["nro"])) {
  $n=$_POST["nro"];
  $f=$_POST["fecha"];
  $d=$_POST["contenido"];
  $c=$_POST["correccion"];
  $z=$_POST["grado"];
  $m=$_POST["codigo"];
  

  $consulta="insert into `tareas`(`Numero`,`Fecha_entrega_tarea`,`Descripcion`,`Correccion`,`tarea_grado`,`Materia_Cod_materia`) values ('$n','$f','$d','$c','$z','$m')";

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
<h2><?php echo $nm ?>°  -  <?php echo $mg['Descripcion'] ?>  - Tarea</h2>
</div><br>
<div class="row" style="margin-top: 20px; text-align:center;">
      <?php echo "<p style='color:red;'>* Error al subir el archivo, solo extensiones PDF</p>"; ?> 
</div>
            <div class="row">
                <div class="col-lg-12">
                             <table class="table table-striped table-bordered table-hover" id="dataTables-addControls" style="text-align:center;">
                                    <thead>
                                        <tr>
                                         
                                            <th style="text-align: center;">Nro.</th>
                                            <th style="text-align: center;">Fecha de Entrega</th>
                                            <th style="text-align: center;">Contenido</th>
                                            <th style="text-align: center;">Corrección</th>
                                            <th style="text-align: center;">Acciones</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>


<?php 
$sql = "select distinct t.`idTareas`, t.`Numero`,t.`Fecha_entrega_tarea`,t.`Descripcion`,t.`Correccion`, t.`tarea_grado`, t.`Materia_Cod_materia`
from`tareas`t
inner join `materia`m
on t.`Materia_Cod_materia`=m.`Cod_materia`
inner join `grado`g
on m.`Grado_Nro_grado`= g.`Nro_grado`
inner join `vinculo` v
on g.`Nro_grado`= v.`Grado_Nro_grado`
inner join `docente`d
on v.`Docente_DNI_docente`= d.`DNI_docente`
where t.`Materia_Cod_materia`=$cm and t.`tarea_grado`=$nm and v.`Docente_DNI_docente`=$dd";

$rs = mysqli_query($db, $sql);
if ( $rs ) {
  while ($r = mysqli_fetch_array($rs) ) {
?>
                                        <tr>  
                                          <td><?php  echo $r["1"]; ?></td>
                                          <td><?php  echo $r["2"]; ?></td>
                                          <td style="width: 400px;"><?php  echo $r["3"]; ?></td>
                                          <td>
                                            <a href="javascript:ventanasecundaria('<?php echo $r["idTareas"]; ?>')"><?php echo $r["4"]; ?></a>
                                            <form method="post" action="procesararchivotareas.php?idTareas=<?php echo $r["idTareas"]; ?>&Grado_Nro_grado=<?php echo $nm; ?>&Cod_materia=<?php echo $cm; ?>" enctype="multipart/form-data">
                                              <input name="archivo" REQUIRED type="file"  /><br>
                                              <input type="submit" class="btn btn-success" value="Guardar"/>
                                            </form>
                                          </td>
                                          <td>
                                          <button type="button" class="btn btn-warning" onClick="editartarea(<?php echo $r["idTareas"].','.$cm.','.$nm ?>)" style="margin:auto auto;">Editar</button>                                    
                                          <button type="button" class="btn btn-danger" onClick="borratarea(<?php echo $r["idTareas"].','.$cm.','.$nm ?>)" style="margin:0 5px;">Borrar</button>
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
         <button type="button" class="btn btn-success btn-lg btn-block" onClick="agregat(<?php echo "$cm".','."$nm" ?>)">Agregar Otra</button>
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

  function borratarea(idTareas,Cod_materia,Grado_Nro_grado) {
    location.href = "xxtarea.php?idTareas=" + idTareas + "&Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;
  }

  function editartarea(idTareas,Cod_materia,Grado_Nro_grado) {
    location.href = "editartarea.php?idTareas=" + idTareas + "&Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;
  }

  function agregat(Cod_materia,Grado_Nro_grado) {
    location.href = "unatareaok.php?Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;
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
$mg=recuperar_materia("$cm");

if (isset($_POST["nro"])) {
  $n=$_POST["nro"];
  $f=$_POST["fecha"];
  $d=$_POST["contenido"];
  $c=$_POST["correccion"];
  $z=$_POST["grado"];
  $m=$_POST["codigo"];
  

  $consulta="insert into `tareas`(`Numero`,`Fecha_entrega_tarea`,`Descripcion`,`Correccion`,`tarea_grado`,`Materia_Cod_materia`) values ('$n','$f','$d','$c','$z','$m')";

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
<h2><?php echo $nm ?>°  -  <?php echo $mg['Descripcion'] ?>  - Tarea</h2>
</div><br>
            <div class="row">
                <div class="col-lg-12">
                             <table class="table table-striped table-bordered table-hover" id="dataTables-addControls" style="text-align:center;">
                                    <thead>
                                        <tr>
                                         
                                            <th style="text-align: center;">Nro.</th>
                                            <th style="text-align: center;">Fecha de Entrega</th>
                                            <th style="text-align: center;">Contenido</th>
                                            <th style="text-align: center;">Corrección</th>
                                            <th style="text-align: center;">Acciones</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>


<?php 
$sql = "select distinct t.`idTareas`, t.`Numero`,t.`Fecha_entrega_tarea`,t.`Descripcion`,t.`Correccion`, t.`tarea_grado`, t.`Materia_Cod_materia`
from`tareas`t
inner join `materia`m
on t.`Materia_Cod_materia`=m.`Cod_materia`
inner join `grado`g
on m.`Grado_Nro_grado`= g.`Nro_grado`
inner join `vinculo` v
on g.`Nro_grado`= v.`Grado_Nro_grado`
inner join `docente`d
on v.`Docente_DNI_docente`= d.`DNI_docente`
where t.`Materia_Cod_materia`=$cm and t.`tarea_grado`=$nm and v.`Docente_DNI_docente`=$dd";

$rs = mysqli_query($db, $sql);
if ( $rs ) {
  while ($r = mysqli_fetch_array($rs) ) {
?>
                                        <tr>  
                                          <td><?php  echo $r["1"]; ?></td>
                                          <td><?php  echo $r["2"]; ?></td>
                                          <td style="width: 400px;"><?php  echo $r["3"]; ?></td>
                                          <td>
                                            <a href="javascript:ventanasecundaria('<?php echo $r["idTareas"]; ?>')"><?php echo $r["4"]; ?></a>
                                            <form method="post" action="procesararchivotareas.php?idTareas=<?php echo $r["idTareas"]; ?>&Grado_Nro_grado=<?php echo $nm; ?>&Cod_materia=<?php echo $cm; ?>" enctype="multipart/form-data">
                                              <input name="archivo" REQUIRED type="file"  /><br>
                                              <input type="submit" class="btn btn-success" value="Guardar"/>
                                            </form>
                                          </td>
                                          <td>
                                          <button type="button" class="btn btn-warning" onClick="editartarea(<?php echo $r["idTareas"].','.$cm.','.$nm ?>)" style="margin:auto auto;">Editar</button>                                    
                                          <button type="button" class="btn btn-danger" onClick="borratarea(<?php echo $r["idTareas"].','.$cm.','.$nm ?>)" style="margin:0 5px;">Borrar</button>
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
         <button type="button" class="btn btn-success btn-lg btn-block" onClick="agregat(<?php echo "$cm".','."$nm" ?>)">Agregar Otra</button>
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

  function borratarea(idTareas,Cod_materia,Grado_Nro_grado) {
    location.href = "xxtarea.php?idTareas=" + idTareas + "&Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;
  }

  function editartarea(idTareas,Cod_materia,Grado_Nro_grado) {
    location.href = "editartarea.php?idTareas=" + idTareas + "&Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;
  }

  function agregat(Cod_materia,Grado_Nro_grado) {
    location.href = "unatareaok.php?Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;
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
 </body>
</html>