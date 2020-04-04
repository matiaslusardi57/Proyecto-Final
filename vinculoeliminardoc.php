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
	<title>Eliminar vinculo Docente-Materia</title>
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

<div class="container">
  <div class="col-lg-12" style="text-align:center;">
    <h3>Listado de Vinculos</h3>
  </div>
</div>
  <div class="row">
       <div class="col-lg-8 col-lg-offset-2" style="background-color: #E3FFE8; padding-top: 10px;">
               
                 
                             <table class="table table-striped table-bordered table-hover" id="dataTables-addControls">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Grado</th>
                                            <th style="text-align: center;">Materia</th>
                                            <th style="text-align: center;">Profesor</th>
                                            <th style="text-align: center;">Eliminar Este Vinculo</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                          <?php 
                          $sql = "SELECT distinct v.`Grado_Nro_grado`,m.`Descripcion` ,d.`NombreApellido`,d.`DNI_docente`,m.`Cod_materia`
                                  FROM `vinculo`v
                                  inner join `materia`m
                                  on v.`Materia_Cod_materia`= m.`Cod_materia`
                                  inner join `docente`d
                                  on v.`Docente_DNI_docente`= d.`DNI_docente`
                                  
                                 ";

                          $rs = mysqli_query($db, $sql);
                          if ( $rs ) {
                            while ($r = mysqli_fetch_array($rs) ) {
                              ?>
                                        <tr>
                                          
                                            <td><?php  echo $r["0"]; ?></td>
                                            <td><?php  echo $r["1"]; ?></td>
                                            <td><?php  echo $r["2"]; ?></td>
                                            <td style="text-align: center;">
                                            <button type="button" class="btn btn-danger" onClick="borravinculod(<?php echo $r["0"].','.$r["4"].','.$r["3"] ?>)">Borrar</button>
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
      <a href="vinculoeliminar.php" role="button" class="btn btn-default btn-lg btn-block"> 
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

  function borravinculod(Grado_Nro_grado,Cod_materia,DNI_docente) {
    location.href = "xxvinculod.php?Grado_Nro_grado=" + Grado_Nro_grado + "&Cod_materia=" + Cod_materia + "&DNI_docente=" + DNI_docente;
  }
  
    </script>
   
</body>
</html>