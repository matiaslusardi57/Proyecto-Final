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
	<title>agrega practico</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="estilo.css">
  <script language=javascript>
  function ventanasecundaria (idPracticos) {
    window.open("veronlinepractico.php?idPracticos=" + idPracticos);
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


<?php if(isset($_GET["p"])) { ?> 
 
<?php
$nm=$_GET["Grado_Nro_grado"];
$cm=$_GET["Cod_materia"];
$dd=$docente['DNI_docente'];
$mg=recuperar_materia("$cm");

if (isset($_POST["nro3"])) {
$n=$_POST["nro3"];
$f=$_POST["fecha3"];
$d=$_POST["contenido3"];
$c=$_POST["correccion3"];
$z=$_POST["grado3"];
$m=$_POST["codigo3"];


$consulta="insert into `practicos`(`Numero`,`Descripcion`,`Resultado`,`Fecha_entrega_practico`,`practico_grado`,`Materia_Cod_materia`)  values ('$n','$d','$c','$f','$z','$m')";

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
    <h2><?php echo $nm ?>°  -  <?php echo $mg['Descripcion'] ?>  - Practico</h2>
  </div>  <br>
    <div class="row" style="margin-top: 20px; text-align:center;">
      <?php echo "<p style='color:red;'>* Error al subir el archivo</p>"; ?> 
    </div>
 
            <div class="row">
                <div class="col-lg-12">
                             <table class="table table-striped table-bordered table-hover" id="dataTables-addControls" style="text-align:center;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Nro</th>
                                            <th style="text-align: center;">Fecha Entrega</th>
                                            <th style="text-align: center;">Contenido</th>
                                            <th style="text-align: center;">Correccion</th>
                                            <th style="text-align: center;">Acciones</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$sql = "select distinct p.`idPracticos`,p.`Numero`,p.`Descripcion`,p.`Resultado`,p.`Fecha_entrega_practico`,p.`practico_grado`,p.`Materia_Cod_materia`
from`practicos`p
inner join `materia`m
on p.`Materia_Cod_materia`=m.`Cod_materia`
inner join `grado`g
on m.`Grado_Nro_grado`= g.`Nro_grado`
inner join `vinculo` v
on g.`Nro_grado`= v.`Grado_Nro_grado`
inner join `docente`d
on v.`Docente_DNI_docente`= d.`DNI_docente`
where p.`Materia_Cod_materia`=$cm and p.`practico_grado`=$nm and v.`Docente_DNI_docente`=$dd";

$rs = mysqli_query($db, $sql);
if ( $rs ) {
  while ($r = mysqli_fetch_array($rs) ) {
?>
                                        <tr>
                                          <td><?php  echo $r["1"]; ?></td>
                                          <td><?php  echo $r["4"]; ?></td>
                                          <td style="width: 400px;"><?php  echo $r["2"]; ?></td>
                                          <td>
                                            <a href="javascript:ventanasecundaria('<?php echo $r["idPracticos"]; ?>')"><?php echo $r["3"]; ?></a>
                                            <form method="post" action="procesararchivopracticos.php?idPracticos=<?php echo $r["idPracticos"]; ?>&Grado_Nro_grado=<?php echo $nm; ?>&Cod_materia=<?php echo $cm; ?>" enctype="multipart/form-data">
                                              <input name="archivo" REQUIRED type="file"  /><br>
                                              <input type="submit" class="btn btn-success" value="Guardar"/>
                                            </form>
                                          </td>
                                          <td>
                                            <button type="button" class="btn btn-warning" onClick="editpractico(<?php echo $r["idPracticos"].','.$cm.','.$nm ?>)" style="margin:auto auto;">Editar</button>
                                            <button type="button" class="btn btn-danger" onClick="borrapractico(<?php echo $r["idPracticos"].','.$cm.','.$nm ?>)" style="margin:0 5px;">Borrar</button>
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
         <button type="button" class="btn btn-primary btn-lg btn-block" onClick="agregap(<?php echo "$cm".','."$nm" ?>)">Agregar Otro</button>
         </div>
         </div>
         <div class="row" style="margin:20px 0;">
          <div class="col-lg-offset-5 col-lg-2">
           <a href="docente1.php" role="button" class="btn btn-default btn-lg btn-block"> 
            <p style="margin: 3px 0;">Volver</p>
           </a>
          </div>
         </div>
    </div>





    <script>

  function borrapractico(idPracticos,Cod_materia,Grado_Nro_grado) {
    location.href = "xxpractico.php?idPracticos=" + idPracticos + "&Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;
  }

  function editpractico(idPracticos,Cod_materia,Grado_Nro_grado) {
    location.href = "editarpractico.php?idPracticos=" + idPracticos + "&Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;
  }
  
  function agregap(Cod_materia,Grado_Nro_grado) {
    location.href = "unpracticook.php?Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;
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

if (isset($_POST["nro3"])) {
$n=$_POST["nro3"];
$f=$_POST["fecha3"];
$d=$_POST["contenido3"];
$c=$_POST["correccion3"];
$z=$_POST["grado3"];
$m=$_POST["codigo3"];


$consulta="insert into `practicos`(`Numero`,`Descripcion`,`Resultado`,`Fecha_entrega_practico`,`practico_grado`,`Materia_Cod_materia`)  values ('$n','$d','$c','$f','$z','$m')";

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
    <h2><?php echo $nm ?>°  -  <?php echo $mg['Descripcion'] ?>  - Practico</h2>
    </div><br>
            <div class="row">
                <div class="col-lg-12">
                             <table class="table table-striped table-bordered table-hover" id="dataTables-addControls" style="text-align:center;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Nro</th>
                                            <th style="text-align: center;">Fecha Entrega</th>
                                            <th style="text-align: center;">Contenido</th>
                                            <th style="text-align: center;">Correccion</th>
                                            <th style="text-align: center;">Acciones</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$sql = "select distinct p.`idPracticos`,p.`Numero`,p.`Descripcion`,p.`Resultado`,p.`Fecha_entrega_practico`,p.`practico_grado`,p.`Materia_Cod_materia`
from`practicos`p
inner join `materia`m
on p.`Materia_Cod_materia`=m.`Cod_materia`
inner join `grado`g
on m.`Grado_Nro_grado`= g.`Nro_grado`
inner join `vinculo` v
on g.`Nro_grado`= v.`Grado_Nro_grado`
inner join `docente`d
on v.`Docente_DNI_docente`= d.`DNI_docente`
where p.`Materia_Cod_materia`=$cm and p.`practico_grado`=$nm and v.`Docente_DNI_docente`=$dd";

$rs = mysqli_query($db, $sql);
if ( $rs ) {
  while ($r = mysqli_fetch_array($rs) ) {
?>
                                        <tr>
                                          <td><?php  echo $r["1"]; ?></td>
                                          <td><?php  echo $r["4"]; ?></td>
                                          <td style="width: 400px;"><?php  echo $r["2"]; ?></td>
                                          <td>
                                            <a href="javascript:ventanasecundaria('<?php echo $r["idPracticos"]; ?>')"><?php echo $r["3"]; ?></a>
                                            <form method="post" action="procesararchivopracticos.php?idPracticos=<?php echo $r["idPracticos"]; ?>&Grado_Nro_grado=<?php echo $nm; ?>&Cod_materia=<?php echo $cm; ?>" enctype="multipart/form-data">
                                              <input name="archivo" REQUIRED type="file"  /><br>
                                              <input type="submit" class="btn btn-success" value="Guardar"/>
                                            </form>
                                          </td>
                                          <td>
                                            <button type="button" class="btn btn-warning" onClick="editpractico(<?php echo $r["idPracticos"].','.$cm.','.$nm ?>)" style="margin:auto auto;">Editar</button>
                                            <button type="button" class="btn btn-danger" onClick="borrapractico(<?php echo $r["idPracticos"].','.$cm.','.$nm ?>)" style="margin:0 5px;">Borrar</button>
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
         <button type="button" class="btn btn-primary btn-lg btn-block" onClick="agregap(<?php echo "$cm".','."$nm" ?>)">Agregar Otro</button>
         </div>
         </div>
         <div class="row" style="margin:20px 0;">
          <div class="col-lg-offset-5 col-lg-2">
           <a href="docente1.php" role="button" class="btn btn-default btn-lg btn-block"> 
            <p style="margin: 3px 0;">Volver</p>
           </a>
          </div>
         </div>
    </div>




    <script>

  function borrapractico(idPracticos,Cod_materia,Grado_Nro_grado) {
    location.href = "xxpractico.php?idPracticos=" + idPracticos + "&Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;
  }

  function editpractico(idPracticos,Cod_materia,Grado_Nro_grado) {
    location.href = "editarpractico.php?idPracticos=" + idPracticos + "&Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;
  }
  
  function agregap(Cod_materia,Grado_Nro_grado) {
    location.href = "unpracticook.php?Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;
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