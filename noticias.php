<?php
  include("includes/conectar.php");
  include("includes/funciones_utiles.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Noticias</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
 	<script src="js/arriba.js"></script>
	
</head>
<header>
  <?php
    include("zheader.php");
   ?>
</header>
<body>

<span class="ir-arriba">
  <span class="glyphicon glyphicon-chevron-up"  style="color:#fff;"></span>
</span>

   

<div class="container" style="margin-top: 50px;">
	<h3>NOTICIAS</h3>
	<div class="row">
		<b>
		    <?php 
              $sql = "SELECT * FROM `noticias` ORDER BY `idNoticia` DESC";
              $rs = mysqli_query($db, $sql);
              if ( $rs ) {
                while ($r = mysqli_fetch_array($rs) ) {
              ?>

		<div class="col-lg-5" style="margin-right: 90px">
			<h4 style="text-align: center;"><?php  echo $r["Titulo"]; ?></h4>
			<img src="<?php  echo $r["Imagen"]; ?>" alt="noticia1" class="img-thumbnail">
			<br>
			<p> Fecha Publicacion : 
			<?php  echo $r["Fecha"]; ?>
			</p>
			<div class="col-lg-12" style="text-align: center;">
			<a href="#<?php  echo $r["idNoticia"]; ?>" data-toggle="modal" style="margin-left: 150px"><p>Leer Noticia Completa</p></a>
			</div>
			<br><br>

			<!-- Modal -->
<div class="modal fade" id="<?php  echo $r["idNoticia"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php  echo $r["Titulo"]; ?></h4>
      </div>
      <div class="modal-body">
        	<div class="col-lg-12">
							
								<img src="<?php  echo $r["Imagen"]; ?>" alt="noticia1" class="img-thumbnail">
								<p style="margin-top: 10px;">
								<?php  echo $r["Contenido"]; ?>
								</p><br>
								<h5 style="text-align: right;"> Fecha Publicacion : 
								<?php  echo $r["Fecha"]; ?>
								</h5>
							</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

				

		</div>
           <?php  
				}
			}
		?>
		</b>
	</div>
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
