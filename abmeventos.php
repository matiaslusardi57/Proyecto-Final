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
	<title>ABM Eventos</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <script src="js/jquery-1.12.2.js"></script>
  <script src="js/bootstrap.min.js"></script>  
  <script src="js/jquery-ui.js"></script> 
  <link rel="stylesheet" href="js/themes/smoothness/jquery-ui.css">
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
  function ventanasecundaria (idEvento) {
    window.open("evento.php?");
  }
  </script>
 <script>
  $.datepicker.regional['es'] = {
   closeText: 'Cerrar',
   prevText: '<Ant',
   nextText: 'Sig>',
   currentText: 'Hoy',
   monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
   monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
   dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
   dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
   dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
   weekHeader: 'Sm',
   dateFormat: 'dd/mm/yy',
   firstDay: 1,
   isRTL: false,
   showMonthAfterYear: false,
   yearSuffix: ''
   };
   var dateToday = new Date();
   $.datepicker.setDefaults($.datepicker.regional['es']);
  $(function() {
    $( "#datepicker" ).datepicker({
       minDate: dateToday
    });
  });
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
    <h2>Listado de Eventos</h2>
</div>

 <div class="row">
    <div class="col-lg-10 col-lg-offset-1" style="margin-top: 10px">
      <table class="table table-striped table-bordered table-hover" id="dataTables-addControls">
          <thead>
           <tr>
            <th class="col-lg-2">Fecha del Evento</th>
            <th>Título</th>
            <th>Lugar</th>
            <th style="text-align: center;">Borrar</th>
            </tr>
          </thead>
        <tbody>
              <?php 
              $sql = "SELECT * FROM `eventos` order by Anio, idEvento";
              $rs = mysqli_query($db, $sql);
              if ( $rs ) {
                while ($r = mysqli_fetch_array($rs) ) {
              ?>

            <tr>
               <td>
                <?php  echo $r["Dia"]; ?> / <?php  echo $r["Mes"]; ?> / <?php  echo $r["Anio"]; ?>
               </td>
               <td>
                 <a href="javascript:ventanasecundaria('<?php echo $r["idEvento"]; ?>')"><?php  echo $r["TituloEvento"]; ?>
                </a>
               </td>
                <td>
                <?php  echo $r["Lugar"]; ?>
                </td>
                <td class="sorting_1" style="text-align: center;">
                <button type="button" class="btn btn-danger" onClick="borrar(<?php echo $r["idEvento"] ?>)">Borrar</button>
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
      <form class="form-horizontal" name="form1" method="post" action="altaevento.php" autocomplete="off">
         <div style="text-align:center;margin-top: 50px;">
         <h4>Complete los Datos</h4>
        </div>
          <div class="form-group" style="margin-top: 30px;">
            <label for="titulo" class="col-sm-2 col-sm-offset-1 control-label">Título del Evento</label>
            <div class="col-lg-8">
              <textarea type="text" class="form-control" name="titulo" required=""> </textarea>
            </div>
          </div>
        <div class="form-group" style="margin-top: 40px;">
            <label for="fecha" class="col-sm-1 col-sm-offset-2 control-label">Fecha</label>
            <div class="col-lg-3">
           <input type="text" name="fecha" id="datepicker">
           </div>
        </div>
   
            <div class="form-group" style="margin-top: 40px;">
              <label for="hora" class="col-sm-1 col-sm-offset-2 control-label">Hora</label>
                <div class="col-lg-3">
                 <input type="text" class="form-control" name="hora" required=""> 
                </div>
            </div>
              <div class="form-group" style="margin-top: 40px;">
              <label for="lugar" class="col-sm-1 col-sm-offset-2 control-label">Lugar</label>
                <div class="col-lg-8">
                 <input type="text" class="form-control" name="lugar" required="">
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
      <a href="contenido.php" role="button" class="btn btn-primary btn-lg btn-block"> 
        <p style="margin: 3px 0;">Volver</p>
      </a>
    </div>
    <div class="col-lg-4 col-sm-offset-0">
      <!-- Large modal -->
      <a href="#ventana1" role="button" class="btn btn-success btn-lg btn-block" data-toggle="modal"><p style="margin: 3px 0;">Agregar Evento</p>
      </a>
    </div>
  </div> 

<script>
  function borrar(idEvento) {
    location.href = "borrarevento.php?idEvento=" + idEvento;
  }
</script>

 
<div class="clearfooter"></div>

</div>


<?php
  include("zfooter.php");
?>

   	
</body>
</html>