<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");


  $docente = recuperar_docente($_SESSION['usuario']);

 ?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Mis Cátedras</title>
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
 <div class="row">
 <div style="text-align:center;">

<h1><?php echo $docente['NombreApellido'] ?></h1>
</div>
</div>
    <div class="caja3">
    <div class="caja4">
         <div class="row"> 
         <div class="col-lg-offset-4 col-lg-4">
         <a class="btn btn-danger btn-lg btn-block" href="buscaf.php" role="button">Avisos Particulares para Alumnos</a>
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
                                            <th style="text-align: center;">Publicar</th>                                        
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
                                            <button type="button" class="btn btn-success" onClick="agregapractico(<?php echo $r["Cod_materia"].','.$r["Grado_Nro_grado"] ?>)"style="margin:0 5px;">Práctico</button>
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

     <div class="row" style="margin:20px 0;">
    <div class="col-lg-offset-5 col-lg-2">
      <a href="docente1.php" role="button" class="btn btn-primary btn-sm btn-block"> 
        <p style="margin: 3px 0;">Volver</p>
      </a>
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
