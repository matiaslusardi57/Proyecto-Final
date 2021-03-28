<?php
  include("includes/conectar.php");
  include("includes/funciones_utiles.php");

$admin = recuperar_admin($_SESSION['usuario']);

session_start();

  if(!isset($_SESSION['usuario'])){
    
    header("vinculoeliminardoc.php");
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Listado Alumnos</title>
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

<div class="container">
  <div class="col-lg-12" style="text-align:center;">
   <h1>Listados Alumnos por Grado</h1>
  </div>
</div>
  <div class="row">
       <div class="col-lg-8 col-lg-offset-2" style="background-color: #E3FFE8; padding-top: 10px;">
               
                 
                             <table class="table table-striped table-bordered table-hover" id="dataTables-addControls">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Grado</th>
                                            <th style="text-align: center;">Dni</th>
                                            <th style="text-align: center;">Nombre y Apellido</th>
                                             <th style="text-align: center;">Direccion</th>
                                           
                                                
                                        </tr>
                                    </thead>
                                    <tbody>
                          <?php 
                          $sql = "SELECT g.`Nro_grado`, a.`DNI_Alumno`,a.`NombreApellido`,a.`Direccion`
                                  FROM `alumno` a
                                  inner join `grado` g
                                  on g.`Nro_grado`= a.`Grado_Nro_grado`
                                  ORDER by g.`Nro_grado`";

                          $rs = mysqli_query($db, $sql);
                          if ( $rs ) {
                            while ($r = mysqli_fetch_array($rs) ) {
                              ?>
                                        <tr>
                                          
                                            <td><?php  echo $r["0"]; ?></td>
                                            <td><?php  echo $r["1"]; ?></td>
                                            <td><?php  echo $r["2"]; ?></td>
                                            <td><?php  echo $r["3"]; ?></td>
                                 
                                         
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
      <a href="generales.php" role="button" class="btn btn-default btn-lg btn-block"> 
        <p style="margin: 3px 0;">Volver</p>
      </a>
    </div>
  </div>





 
<div class="clearfooter"></div>

</div>

<?php
  include("zfooter.php");
?>

    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script src="js/plugins/dataTables/jquery.dataTables1.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap1.js"></script>



    <script>
    $(document).ready(function() {
        $('#dataTables-addControls').dataTable();
    });
  
    </script>
   
</body>
</html>