<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");

$admin = recuperar_admin($_SESSION['usuario']);

session_start();

  if(!isset($_SESSION['usuario'])){
    
    header("location:paginaadmin.php");
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Balances</title>
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
  function ventanasecundaria (idBalance) {
    window.open("balances.php?");
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

<br><br>
 <div style="text-align:center;">
    <h2>Historial de Balances</h2>
</div>

 <div class="row">
    <div class="col-lg-10 col-lg-offset-1" style="margin-top: 10px">
      <table class="table table-striped table-bordered table-hover" id="dataTables-addControls">
          <thead>
           <tr>
            <th class="col-lg-2">Fecha Publicacion</th>
            <th>Comentario</th>
            <th>Archivo</th>
            <th style="text-align: center;">Borrar</th>
            </tr>
          </thead>
        <tbody>
              <?php 
              $fechaActual = date('d-m-Y');
              $sql = "SELECT * FROM `balances` order by Anio, idBalance";
              $rs = mysqli_query($db, $sql);
              if ( $rs ) {
                while ($r = mysqli_fetch_array($rs) ) {
              ?>

            <tr>
               <td>
                <?php  echo $r["Fecha"]; ?>
               </td>
               <td>
                 <a href="javascript:ventanasecundaria('<?php echo $r["idBalance"]; ?>')"><?php  echo $r["Comentario"]; ?>
                </a>
               </td>
                <td>
                <?php  echo $r["Archivo"]; ?>
                </td>
                <td class="sorting_1" style="text-align: center;">
                <button type="button" class="btn btn-danger" onClick="borrar(<?php echo $r["idBalance"] ?>)">Borrar</button>
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

<div class="modal fade col-lg-8 col-sm-offset-2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="ventana1">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form class="form-horizontal" name="form1" method="post" action="altabalance.php" enctype="multipart/form-data">
         <div style="text-align:center;margin-top: 50px;">
         <h4>Complete los datos</h4>
        </div>
          <div class="hidden">
              <input type="text" class="form-control" name="fecha" value="<?php echo $fechaActual ?>">
          </div>    
          <div class="form-group" style="margin-top: 40px;">
              <label for="comentario" class="col-sm-1 col-sm-offset-2 control-label">Comentario</label>
                <div class="col-lg-8">
                 <input type="text" class="form-control" name="comentario" required="">
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


</div>

  <div class="row" style="margin:20px 0;">
    <div class="col-lg-offset-3 col-lg-2">
      <a href="contenido.php" role="button" class="btn btn-default btn-lg btn-block"> 
        <p style="margin: 3px 0;">Volver</p>
      </a>
    </div>
    <div class="col-lg-4 col-sm-offset-0">
      <!-- Large modal -->
      <a href="#ventana1" role="button" class="btn btn-success btn-lg btn-block" data-toggle="modal"><p style="margin: 3px 0;">Nuevo Balance</p>
      </a>
    </div>
  </div> 

<script>
  function borrar(idBalance) {
    location.href = "borrarbalance.php?idBalance=" + idBalance;
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