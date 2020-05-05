<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");


$docente = recuperar_docente($_SESSION['usuario']);

$nm=$_GET["Grado_Nro_grado"];
$cm=$_GET["Cod_materia"];
$mg=recuperar_materia("$cm");
$nm=$_GET["Grado_Nro_grado"];

 ?><!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Un Practico</title>
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
 

      <br>
 <div class="row">
 <div style="text-align:center;">
<h1><?php echo $docente['NombreApellido'] ?></h1>
</div>
</div>
<br>
      <div class="caja3">
      <div style="text-align:center;">
<h2><?php echo $nm ?>°  -  <?php echo $mg['Descripcion'] ?>  - Practico</h2>
</div><br>

            <div class="row">
                <div class="col-lg-12">
                          
                             <table class="table table-striped table-bordered table-hover" id="dataTables-addControls">
                                    <thead>
                                        <tr>
                                                                                                  
                                            <th style="text-align: center;">Nro</th>
                                            <th style="text-align: center;">Fecha Entrega</th>
                                            <th style="text-align: center;">Contenido</th>
                                            <th class="hidden">Correccion</th>
                                            <th class="hidden">Codigomateria</th>         
                                            <th class="hidden">Numerogrado</th>
                                            <th style="text-align: center;">Confirmar</th>
                                        
                                        
                                        </tr>
                                    </thead>

                                    <form name="form3" method="post" action="agregapractico.php?Grado_Nro_grado=<?php echo $nm; ?>&Cod_materia=<?php echo $cm; ?>" autocomplete="off">
                                    <tbody>
                                        <tr>                   
                                          <td> 
                                          <label for="nro3" ></label>
                                          <input type="number" name="nro3" id="nro3" style="width:50px;height:20px"> 
                                          </td>
                                          <td>
                                            <label for="fecha3"></label>
                                          <input type="text" name="fecha3" id="datepicker" style="width:90px;height:20px">
                                          </td>
                                          <td>
                                          <label for="contenido3"></label>
                                          <textarea name="contenido3" id="contenido3" cols="100%" rows="5"></textarea> 
                                          </td>
                                          <td class="hidden">
                                            <label for="correccion3"></label>
                                          <input type="text" name="correccion3" id="correccion3">
                                          </td>
                                          <td class="hidden">
                                            <label for="codigo3"></label>
                                          <input type="number" name="codigo3" value="<?php echo $cm ?>" id="codigo3">
                                          </td>
                                          <td class="hidden">
                                            <label for="grado3"></label>
                                          <input type="number" name="grado3" value="<?php echo $nm ?>" id="grado3">
                                          </td>
                                          <td style="text-align: center;">
                                          <input type="submit" value="Confirmar" class="btn btn-success" name="confirmar3" id="confirmar3">
                                          </td>
                                        </tr>
                                    </tbody>
                                    </form>
                                </table>
                  </div>
                  </div>
            
            <div class="row" style="margin:20px 0;">
            <div class="col-lg-6 col-lg-offset-3" style="margin-top: 20px; margin-bottom: 20px;">  
                <button class="btn btn-primary btn-lg btn-block" onclick="volver(<?php echo "$cm".','."$nm" ?>)">Volver</botton>
            </div>
              </div> 

 <script>

  function volver(Cod_materia,Grado_Nro_grado) {
    location.href = "agregapractico.php?Cod_materia=" + Cod_materia + "&Grado_Nro_grado=" + Grado_Nro_grado;
  }


 </script>


 
  <div class="clearfooter"></div>
  </div>

<?php
  include("zfooter.php");
 ?>

   
 </body>
</html>
