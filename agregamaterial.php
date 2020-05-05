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
	<title>Nuevo Material</title>
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
 
 <?php
$nm=$_GET["Grado_Nro_grado"];
$cm=$_GET["Cod_materia"];
$dd=$docente['DNI_docente'];
$mg=recuperar_materia("$cm");
?>

<br>
    <div class="caja3">
      <div style="text-align:center;">
        <h2>Material para <?php echo $nm ?>°  -  <?php echo $mg['Descripcion'] ?></h2>
        </div><br>

            <div class="row">
                <div class="col-lg-12">
                             <table class="table table-striped table-bordered table-hover" id="dataTables-addControls">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Descripcion</th>
                                            <th style="text-align: center;">Archivo</th>
                                            <th style="text-align: center;">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>


<?php 
$sql = "SELECT * FROM `materiales` 
        where  Grado_Nro_grado = $nm and Materia_Cod_materia = $cm
        ORDER BY `idMaterial` ASC";

$rs = mysqli_query($db, $sql);
if ( $rs ) {
  while ($r = mysqli_fetch_array($rs) ) {
?>
                                        <tr>  
                                          <td><?php  echo $r["Descripcion"]; ?></td>
                                          <td><?php  echo $r["Archivo"]; ?></td>
                                          <td style="text-align: center;">                        
                                          <button type="button" class="btn btn-danger" onClick="borrarmaterial(<?php echo $r["idMaterial"].','.$cm.','.$nm ?>)" style="margin:0 5px;">Borrar
                                          </button>
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
      <div class="col-lg-8 col-sm-offset-2">
      <!-- Large modal -->
      <a href="#ventana1" role="button" class="btn btn-success btn-lg btn-block" data-toggle="modal"><p style="margin: 3px 0;">Nuevo Material</p>
      </a>
    </div>
         </div>
        <div class="row" style="margin:20px 0;">
          <div class="col-lg-offset-5 col-lg-2">
           <a href="abmmaterial.php" role="button" class="btn btn-default btn-lg btn-block"> 
            <p style="margin: 3px 0;">Volver</p>
           </a>
          </div>
        </div>
    </div>

    <div class="modal fade col-lg-8 col-sm-offset-2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="ventana1">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form class="form-horizontal" name="form1" method="post" action="altamaterial.php" enctype="multipart/form-data">
         <div style="text-align:center;margin-top: 50px;">
         <h4>Complete los datos</h4>
        </div>
          <div class="hidden">
              <input type="text" class="form-control" name="grado" value="<?php echo $nm ?>">
          </div> 
             <div class="hidden">
              <input type="text" class="form-control" name="materia" value="<?php echo $cm ?>">
          </div>    
          <div class="form-group" style="margin-top: 40px;">
              <label for="Descripcion" class="col-sm-1 col-sm-offset-2 control-label">Descripcion</label>
                <div class="col-lg-8">
                 <input type="text" class="form-control" name="Descripcion" required="">
                </div>
            </div>
            <div class="form-group" style="margin-top: 40px;">
              <label for="archivo" class="col-sm-1 col-sm-offset-2 control-label">Archivo</label>
                <div class="col-lg-8">
                 <input type="file" class="form-control" name="archivo" required=""> 
                </div>
            </div>
          <div class="form-group" style="margin-top: 40px;margin-bottom: 30px;">
            <div class="col-lg-2 col-sm-offset-4">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
            <div class="col-lg-2">
              <button type="submit" class="btn btn-success">Confirmar</button>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>



    <script>

 function borrarmaterial(idMaterial,Cod_materia,Grado_Nro_grado) {
   location.href = "borramaterial.php?idMaterial=" + idMaterial + "&Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;
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