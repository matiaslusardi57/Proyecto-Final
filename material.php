<?php
  include("includes/conectar.php");
  include("includes/funciones_utiles.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Material</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="estilo.css">
	 <script language=javascript>
  function ventanasecundaria (idMaterial) {
    window.open("veronlinematerial.php?idMaterial=" + idMaterial);
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

<div class="container" style="margin-top: 50px;">
	<div class="row">
		<h2>MATERIAL DE ESTUDIO</h2>
		<p style="'open_sansregular',"Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;">
			Desde los siguientes enlaces podrá acceder al material de estudios.
		</p>
	</div>
	<br>
   <?php 
             $sql0 =  "SELECT DISTINCT `Descripcion`, `Cod_materia` FROM `materia`" ;
                $rs0 = mysqli_query($db, $sql0);
              if ( $rs0 ) {
                while ($r0 = mysqli_fetch_array($rs0) ) {
  ?>


	
		<div class="panel-group" id="accordion" role="tablist">
			<div class="panel panel-primary">
				<div class="panel-heading" rol="tab" id="heading1">
					<h4 class="panel-title">
						<a href="#<?php  echo $r0["Cod_materia"]; ?>" data-toggle="collapse" data-parent="#accordion">
							 <?php  echo $r0["Descripcion"];
				                $codigo = $r0["Cod_materia"];
				               ?>
						</a>
					</h4>
				</div>
				<div id="<?php  echo $r0["Cod_materia"]; ?>" class="panel-collapse collapse">
					<div class="panel-body">
						   <?php 
		              $sql = "SELECT * FROM `materiales` WHERE `Materia_Cod_materia` = $codigo ORDER BY `Grado_Nro_grado`";
		              $rs = mysqli_query($db, $sql);
		              if ( $rs ) {
		                while ($r = mysqli_fetch_array($rs) ) {
		              ?>
		<a href="javascript:ventanasecundaria('<?php echo $r["idMaterial"]; ?>')"><span>Año:</span>  <?php  echo $r["Grado_Nro_grado"]; ?>°  -- <span> Materia:</span> <?php  echo $r0["Descripcion"]; ?>  -- <span> Descripcion:</span> <?php  echo $r["Descripcion"]; ?> -<span> Ver Material </span></a><br>
		  <?php 
                  }
                }
                ?>
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

<?php
  include("zfooter.php");
 ?>

	<script src="js/jquery-1.12.2.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>