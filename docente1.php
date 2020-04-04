<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");


  $docente = recuperar_docente($_SESSION['usuario']);

 ?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Principal</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="estilo.css">
</head>

<header>
  <?php
    include("zheader.php");
   ?>
</header>
<body>

<div class="container">
 <br>
 <div class="row">
 <div style="text-align:center;">
 <?php if (isset($_GET["d"])) {
  if($_GET["d"]==1) {   ?>
  <p style="color: green; margin-top: 20px; font-size: 20px;"><b><?php  echo   "Su contraseña ha sido cambiada con exito";?></b><p>
  <?php }} ?>
<h1>Hola <?php echo $docente['NombreApellido'] ?></h1>
</div>
</div>
    <div class="caja3">
    <div class="caja4">
         <div class="row"> 
         <div class="col-lg-offset-4 col-lg-4">
         <a class="btn btn-primary btn-lg btn-block" href="buscaf.php" role="button">Avisos particulares para alumnos</a>
         </div>
         </div>
         </div>
 
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                             <table class="table table-striped table-bordered table-hover" id="dataTables-addControls">
                                    <thead>
                                        <tr>                                         
                                            <th style="text-align: center;">Grado</th>
                                            <th style="text-align: center;">Materia</th>
                                            <th style="text-align: center;">Acciones</th>                                        
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 

$z=$docente['DNI_docente'];

$sql = "select distinct m.`Descripcion`,m.`Grado_Nro_grado`,m.`Cod_materia`
FROM `materia` m
inner join `grado` g
on m.`Grado_Nro_grado`= g.`Nro_grado`
inner join `vinculo` v
on g.`Nro_grado`= v.`Grado_Nro_grado`
inner join `docente`d
on v.`Docente_DNI_docente`= d.`DNI_docente`
where m.`Docente_DNI_docente`=$z 
order by m.`Grado_Nro_grado` asc ";

$rs = mysqli_query($db, $sql);
if ( $rs ) {
  while ($r = mysqli_fetch_array($rs) ) {
?>
                                        <tr>
                     
                                          <td><?php  echo $r["1"]; ?></td>                                          
                                          <td><?php  echo $r["0"]; ?></td>
                                          <td style="text-align: center;">
                                            <button type="button" class="btn btn-success" onClick="agregatarea(<?php echo $r["Cod_materia"].','.$r["Grado_Nro_grado"] ?>)" style="margin:0 5px;">Tarea</button>
                                            <button type="button" class="btn btn-success" onClick="agregaexamen(<?php echo $r["Cod_materia"].','.$r["Grado_Nro_grado"] ?>)"style="margin:0 5px;">Examen</button>
                                            <button type="button" class="btn btn-success" onClick="agregapractico(<?php echo $r["Cod_materia"].','.$r["Grado_Nro_grado"] ?>)"style="margin:0 5px;">Practico</button>
                                            <button type="button" class="btn btn-warning" onClick="agregacomunicado(<?php echo $r["Grado_Nro_grado"] ?>)"style="margin:0 5px;">Comunicados</button>
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
    </div>



    <script>
    $(document).ready(function() {
        $('#dataTables-addControls').dataTable();
    });

  function agregatarea(Cod_materia,Grado_Nro_grado) {
  location.href ="agregatarea.php?Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;


  }

  function agregaexamen(Cod_materia,Grado_Nro_grado) {
    location.href ="agregaexamen.php?Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;

  }


  function agregapractico(Cod_materia,Grado_Nro_grado) {
    location.href ="agregapractico.php?Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;
  }

  function agregacomunicado(Grado_Nro_grado) {
    location.href ="agregacomunicado.php?Grado_Nro_grado=" + Grado_Nro_grado;
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
