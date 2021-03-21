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
	<title>Listados Generales</title>
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
<div class="row" style="text-align:center;">
<h1>Listados Padre-Alumnos</h1>
</div>
<div class="container">
            
      <br /><br />
      <div class="row">  
        <div class="col-lg-4 col-lg-offset-1">
    <h1>Padres</h1>
  </div>
    <div class="col-lg-4">
    <h1>Alumnos</h1>
  </div>
      <div class="col-lg-3">
    <h1>Relaciones</h1>
  </div>
    </div>

            <div class="row">
            <form name="form2" method="post" action="procesavinculo.php">
                <div class="col-lg-4" style="background-color: #E3FFE8; padding-top: 10px;">
               
                 
                             <table class="table table-striped table-bordered table-hover" id="dataTables-addControls">
                                    <thead>
                                        <tr>

                                            <th>Nombre y Apellido</th>
                                            <th>Direccion</th>
                                            <th>Telefono</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                          <?php 
                          $sql = "SELECT *
                                  FROM padre
                                 ";

                          $rs = mysqli_query($db, $sql);
                          if ( $rs ) {
                            while ($r = mysqli_fetch_array($rs) ) {
                              ?>
                                        <tr>
                                          
                                            <td><?php  echo $r["NombreApellido"]; ?></td>
                                            <td><?php  echo $r["Direccion"]; ?></td>
                                            <td><?php  echo $r["Telefono"]; ?></td>
                                         
                                        </tr>
                              <?php 
                                }
                              }
                              ?>
                                    </tbody>
                                </table>
                          </div>
                          <div class="col-lg-4" style="background-color: #E8DE63; padding-top: 10px;">
                             <table class="table table-striped table-bordered table-hover" id="dataTables1-addControls">
                                    <thead>
                                        <tr>
                                            
                                            <th>Nombre y Apellido</th>
                                            <th>Direccion</th>
                                            <th>Grado</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                    <?php 
                    $sql = "SELECT *
                            FROM `alumno` 
                           ";

                    $rs = mysqli_query($db, $sql);
                    if ( $rs ) {
                      while ($r = mysqli_fetch_array($rs) ) {
                    ?>
                                        <tr>
                                            
                                            <td><?php  echo $r["NombreApellido"]; ?></td>
                                            <td><?php  echo $r["Direccion"]; ?></td>
                                              <td><?php  echo $r["Grado_Nro_grado"]; ?></td>
                                           
                                            </td>
                                        </tr>
                          <?php 
                            }
                          }
                          ?>
                                </tbody>
                                </table>
              
             
                </div>
                       <div class="col-lg-4" style="background-color: #E3FFE8; padding-top: 10px;">
               
                 
                             <table class="table table-striped table-bordered table-hover" id="dataTables2-addControls">
                                    <thead>
                                        <tr style="text-align: center;">

                                            <th style="text-align: center;">Padre</th>
                                            <th style="text-align: center;">Hijo</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                          <?php 
                          $sql = "SELECT distinct p.`NombreApellido`, a.`NombreApellido`, ap.`Alumno_DNI_Alumno`, ap.`Padre_DNI_padre`
                                  from `alumno/padre`ap
                                  inner join `alumno`a
                                  on ap.`Alumno_DNI_Alumno`= a.`DNI_Alumno`
                                  inner join `padre`p
                                  on ap.`Padre_DNI_padre`= p.`DNI_padre`
                                  
                                 ";

                          $rs = mysqli_query($db, $sql);
                          if ( $rs ) {
                            while ($r = mysqli_fetch_array($rs) ) {
                              ?>
                                        <tr>
                                          
                                            <td><?php  echo $r["0"]; ?></td>
                                            <td><?php  echo $r["1"]; ?></td>
                                         
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

 </form>

    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script src="js/plugins/dataTables/jquery.dataTables1.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap1.js"></script>
  <script src="js/plugins/dataTables/jquery.dataTables2.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap2.js"></script>


    <script>
    $(document).ready(function() {
        $('#dataTables-addControls').dataTable();
    });

       $(document).ready(function() {
        $('#dataTables1-addControls').dataTable();
    });
             $(document).ready(function() {
        $('#dataTables2-addControls').dataTable();
    });

  
    </script>

  <div class="row" style="margin:20px 0;">
    <div class="col-lg-offset-5 col-lg-2">
      <a href="generales.php" role="button" class="btn btn-primary btn-sm btn-block"> 
        <p style="margin: 3px 0;">Volver</p>
      </a>
    </div>
  </div> 
 
<div class="clearfooter"></div>

</div>



<?php
  include("zfooter.php");
?>

	
</body>
</html>