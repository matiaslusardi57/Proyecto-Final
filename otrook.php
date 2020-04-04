<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");


$docente = recuperar_docente($_SESSION['usuario']);

 ?><!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Otro OK</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <script src="js/jquery-1.12.2.js"></script>
     <script src="js/bootstrap.min.js"></script>  
      <script src="js/jquery-ui.js"></script> 
      <link rel="stylesheet" href="js/themes/smoothness/jquery-ui.css">
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="estilo.css">
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
   $.datepicker.setDefaults($.datepicker.regional['es']);
  $(function() {
    $( "#datepicker" ).datepicker();
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
 
<?php

$grado=$_GET["Grado_Nro_grado"];

?>
 <br>
 <div class="row">
 <div style="text-align:center;">
<h1><?php echo $docente['NombreApellido'] ?></h1>
</div>
</div>
<br>
<div class="caja3">
<h1 style="text-align:center;">Comunicados <?php echo $grado; ?>° Grado</h1><br>

            <div class="row">
                <div class="col-lg-12">
                          
                <table class="table table-striped table-bordered table-hover" id="dataTables-addControls">
                                    <thead>
                                        <tr>
                                         
                                            <th style="text-align: center;">Nro</th>
                                            <th style="text-align: center;">Sobre</th>
                                            <th style="text-align: center;">Fecha</th>
                                            <th class="hidden">Docente</th>
                                            <th style="text-align: center;">Confirmar</th>
                                        
                                        
                                        </tr>
                                    </thead>

                                    <form name="form7" method="post" action="agregacomunicado.php?Grado_Nro_grado=<?php echo $grado; ?>">
                                    <tbody>

                             
                                        <tr>
                     
                                          <td> 
                                          <label for="nro7"></label>
                                          <input type="number" name="nro7" id="nro7" style="width:60px;height:20px"> 
                                          </td>
                                          <td>
                                          <label for="contenido7"></label>
                                          <textarea name="contenido7" id="contenido7" cols="100%" rows="5"></textarea> 
                                          </td>
                                          <td>
                                            <label for="fecha7"></label>
                                          <input type="text" name="fecha7" id="datepicker" style="width:90px;height:20px">
                                          </td>
                                          <td class="hidden">
                                            <label for="docente7"></label>
                                          <input type="text" name="docente7" value="<?php echo $docente['NombreApellido'] ?>" id="docente7">
                                          </td>
                                          <td class="hidden">
                                          <label for="grado"></label>
                                          <input type="number" name="grado" value="<?php echo $grado; ?>" id="grado">
                                          </td>
                                          <td style="text-align: center;">
                                          <input type="submit" value="Confirmar" class="btn btn-success" name="confirmar7" id="confirmar7">
                                          </td>
                                        
                                          
                       
                                        </tr>

                                    </tbody>
                                    </form>
                                </table>



                     </div>
                      </div>
          <div class="row" style="margin:20px 0;">
         <div class="col-lg-offset-5 col-lg-2">
         <button type="button" class="btn btn-default btn-lg btn-block" onClick="agregaotr(<?php echo "$grado" ?>)">Volver</button>
        
         </div>
         </div> 
</div>

   <script>

function agregaotr(Grado_Nro_grado) {
    location.href = "agregacomunicado.php?Grado_Nro_grado=" + Grado_Nro_grado;
  }
  
    </script>

  <div class="clearfooter"></div>
  </div>

<?php
  include("zfooter.php");
 ?>

   
 </body>
</html>