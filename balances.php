<?php
  include("includes/conectar.php");
  include("includes/funciones_utiles.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Balances</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="estilo.css">
  <script language=javascript>
  function ventanasecundaria (idBalance) {
    window.open("veronlinebalance.php?idBalance=" + idBalance);
  }
  </script>
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


 <div style="text-align:center;">
    <h2>Historial de Balances</h2>
</div>

<div class="row">
  <div class="col-lg-5">
    <img src="img/balanceimg.jpg" alt="portadaevento" height="350" style="width: 100%;">
  </div>

   <?php 
             $sql0 =  "SELECT DISTINCT Anio FROM `balances` order by Anio" ;
                $rs0 = mysqli_query($db, $sql0);
              if ( $rs0 ) {
                while ($r0 = mysqli_fetch_array($rs0) ) {
  ?>


<div class="col-md-offset-5" style="margin-top: 30px;">
    <div class="panel-group" id="accordion" role="tablist">
      <div class="panel panel-danger">
        <div class="panel-heading" rol="tab" id="heading1">
          <h4 class="panel-title" style="text-align: center;">
            <a href="#<?php  echo $r0["Anio"]; ?>" data-toggle="collapse" data-parent="#accordion">
              <?php  echo $r0["Anio"];
                $este = $r0["Anio"];
               ?>
            </a>
          </h4>
        </div>
        <div id="<?php  echo $r0["Anio"]; ?>" class="panel-collapse collapse">
          <div class="panel-body">
            <table class="table table-striped table-bordered table-hover" id="dataTables-addControls">
          <thead>
           <tr>
            <th class="col-lg-2">Fecha de Publicación</th>
            <th>Comentario</th>
            <th class="col-lg-2">Archivo</th>
            </tr>
          </thead>
        <tbody>
              <?php 
              $sql = "SELECT * FROM `balances` WHERE `Fecha` LIKE '%$este' order by idBalance";
              $rs = mysqli_query($db, $sql);
              if ( $rs ) {
                while ($r = mysqli_fetch_array($rs) ) {
              ?>

            <tr>
               <td>
                <?php  echo $r["Fecha"]; ?>
               </td>
               <td>
                <?php  echo $r["Comentario"]; ?>
               </td>
                <td>
                <a href="javascript:ventanasecundaria('<?php echo $r["idBalance"]; ?>')"><h5>Ver Balance</h5></a>
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
    </div>
  </div>
 <?php 

                }
              }
 ?>
 </div>



<div class="clearfooter"></div>
</div>

<?php
  include("zfooter.php");
 ?>
 
	<script src="js/jquery-1.12.2.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>
