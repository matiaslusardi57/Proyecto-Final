<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");


$docente = recuperar_docente($_SESSION['usuario']);

 ?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Resultado busqueda</title>
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
            <div class="row">
                <div class="col-lg-12">
                             <table class="table table-striped table-bordered table-hover" id="dataTables-addControls">
                                    <thead>
                                        <tr>
                                         
                                            <th style="text-align:center;">DNI</th>
                                            <th style="text-align:center;">Nombre Y Apellido</th>
                                            <th style="text-align:center;">Direccion</th>
                                            <th style="text-align:center;">Grado</th>
                                            <th style="text-align:center;">Avisos</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$busqueda=$_GET["buscar"];



$consulta= "SELECT `DNI_Alumno`,`NombreApellido`,`Direccion`,`Grado_Nro_grado` 
FROM `alumno` 
where `NombreApellido` like '%$busqueda%'  
order by `Grado_Nro_grado`";

$rs = mysqli_query($db, $consulta);
if ( $rs ) {
  while ($r = mysqli_fetch_array($rs) ) {
?>
                                        <tr>
                     
                                          <td><?php  echo $r["0"]; ?></td>
                                          <td><?php  echo $r["1"]; ?></td>
                                          <td><?php  echo $r["2"]; ?></td>
                                          <td><?php  echo $r["3"]; ?></td>
                                          <td style="text-align:center;">
                                            <button type="button" class="btn btn-danger" onClick="agregaaviso(<?php echo $r["0"] ?>)" style="margin:0 5px;">Agregar Aviso</button>
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
          <div class="row" style="margin:20px 0;">
            <div class="col-lg-offset-5 col-lg-2">
             <a href="catedras.php" role="button" class="btn btn-default btn-lg btn-block"> 
              <p style="margin: 3px 0;">Volver</p>
             </a>
            </div>
         </div> 
        
    </div>

    <script>
    $(document).ready(function() {
        $('#dataTables-addControls').dataTable();
    });

  function agregaaviso(DNI_Alumno) {
    location.href = "agregaaviso.php?DNI_Alumno=" + DNI_Alumno;
  }

   function agregaotro(DNI_Alumno) {
    location.href = "agregaotro.php?DNI_Alumno=" + DNI_Alumno;
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