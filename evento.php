<?php
  include("includes/conectar.php");
  include("includes/funciones_utiles.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Evento</title>
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

<span class="ir-arriba">
  <span class="glyphicon glyphicon-chevron-up"  style="color:#fff;"></span>
</span>


<div class="row">
  <div class="columns col-lg-12">
    <img src="img/logoeventos1.jpg" alt="portadaevento" height="350" style="width: 100%;">
  </div>
</div>


<div class="container" style="margin-top: 50px;">
  <div class="row">
    <h2>Esta es la Lista de eventos para el 2020</h2>
  </div>
             <?php 
              $sql = "SELECT * FROM `eventos`";
              $rs = mysqli_query($db, $sql);
              if ( $rs ) {
                while ($r = mysqli_fetch_array($rs) ) {
              ?>
              <br>
              <table class="col-lg-12">
                <tr>
                  <td>
                   
                    <div id="eventolista">
                     <ul style="list-style:none;">
                      <li>
                        <p class="fecha">
                          <span class="fecha-d"><?php  echo $r["Dia"]; ?></span>
                          <span class="fecha-m"><?php  echo $r["Mes"]; ?></span>
                        </p>
                        <h4 style="color: #db214c;margin-left: 75px; margin-bottom: 0;margin-top: 0px;"><?php  echo $r["TituloEvento"]; ?></h4>
                        <p style="margin-left: 75px;"><?php  echo $r["Hora"]; ?> - <?php  echo $r["Lugar"]; ?></p>
                      </li>
                      </ul>
                     
                      </div>
                    </td>
                </tr>
            </table>
        <?php 
         }
       }
     ?>

<div class="clearfooter"></div>
</div>

<?php
  include("zfooter.php");
 ?>
 
	<script src="js/jquery-1.12.2.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>