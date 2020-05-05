<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");

session_start();

  if(!isset($_SESSION["usuario"])){

    header("location:listadop.php");
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Listado Padre-Alumno</title>
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
    <h3>Listados</h3>
  </div>
</div>


<div class="container">
            
      <br /><br />
      <div class="row">  
        <div class="col-lg-4 col-lg-offset-1">
    <h1>Padres</h1>
  </div>
    <div class="col-lg-offset-1 col-lg-4">
    <h1>Alumnos</h1>
  </div>
    </div>

            <div class="row">
            <form name="form2" method="post" action="procesavinculo.php">
                <div class="col-lg-5 col-lg-offset-1" style="background-color: #E3FFE8; padding-top: 10px;">
               
                 
                             <table class="table table-striped table-bordered table-hover" id="dataTables-addControls">
                                    <thead>
                                        <tr>

                                            <th>Nombre y Apellido</th>
                                            <th>seleccionar</th>
                                            
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
                                            <td><INPUT type="radio" name="padre" value="<?php  echo $r["DNI_padre"]; ?> " required></td>
                                         
                                        </tr>
                              <?php 
                                }
                              }
                              ?>
                                    </tbody>
                                </table>
                          </div>
                          <div class="col-lg-5" style="background-color: #E8DE63; padding-top: 10px;">
                             <table class="table table-striped table-bordered table-hover" id="dataTables1-addControls">
                                    <thead>
                                        <tr>
                                            
                                            <th>Nombre y Apellido</th>
                                            <th>seleccionar</th>
                                           
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
                                            <td><INPUT type="radio" name="alumno" value="<?php  echo $r["DNI_Alumno"]; ?> " required ></td>
                                           
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


 <div class="row" style="margin:50px 0;">
    <div class="col-lg-offset-3 col-lg-2">
      <a href="vincular.php" role="button" class="btn btn-default btn-lg btn-block"> 
        <p style="margin: 0 0;">Volver</p>
      </a>
    </div>
    <div class="col-lg-3 col-lg-offset-1">
      <button type="submit" class="btn btn-success btn-lg btn-block">CONFIRMAR VINCULO</button>
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



    <script>
    $(document).ready(function() {
        $('#dataTables-addControls').dataTable();
    });

       $(document).ready(function() {
        $('#dataTables1-addControls').dataTable();
    });

  function volver() {
    location.href = "paginaadmin.php";
  }  
  
  function borrar(DNI_padre) {
    location.href = "padreborrar.php?DNI_padre=" + DNI_padre;
  }

  function editar(DNI_padre) {
    location.href = "padreeditar.php?DNI_padre=" + DNI_padre;
  }

  function nueva() {
    location.href = "padrenuevo.php";
  }
  
    </script>
 
<div class="clearfooter"></div>

</div>


<?php
  include("zfooter.php");
?>


 
</body>
</html>