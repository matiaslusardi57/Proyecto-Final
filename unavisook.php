<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");


$docente = recuperar_docente($_SESSION['usuario']);

 ?><!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Una Aviso</title>
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
$c=$_GET["DNI_Alumno"];
$mate="select a.`NombreApellido` from `alumno`a where a.`DNI_Alumno`=$c";

$resul=mysqli_query($db, $mate);

    
while (($fila=mysqli_fetch_row($resul))==true) {


 ?>
      <br>
      <div style="text-align:center;">
<h1><?php echo $docente['NombreApellido'] ?></h1>
 </div><br>
      <div class="caja3">
      <div style="text-align:center;">
<h2><?php echo $fila[0] ?>  / Aviso</h2>
</div><br>
<?php 
;
}
?>
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

                                    <form name="form6" method="post" action="agregaaviso.php?DNI_Alumno=<?php echo $c; ?>">
                                    <tbody>

                             
                                        <tr>
                     
                                          <td> 
                                          <label for="nro6"></label>
                                          <input type="number" name="nro6" id="nro6" style="width:60px;height:20px"> 
                                          </td>
                                          <td>
                                          <label for="contenido6"></label>
                                          <textarea type="text" name="contenido6" id="contenido6" cols="100%" rows="5"></textarea>
                                          </td>
                                          <td>
                                            <label for="fecha6"></label>
                                          <input type="text" name="fecha6" id="datepicker" style="width:90px;height:20px">
                                          </td>
                                          <td class="hidden">
                                            <label for="docente6"></label>
                                          <input type="text" name="docente6" value="<?php echo $docente['NombreApellido'] ?>" id="docente6">
                                          </td>
                                          <td class="hidden">
                                          <label for="alumno6"></label>
                                          <input type="number" name="alumno6" value="<?php echo $c; ?>" id="alumno6">
                                          </td>
                                          <td>
                                          <input type="submit" value="confirmar" class="btn btn-success" name="confirmar6" id="confirmar6">
                                          </td>
                                        
                                          
                       
                                        </tr>

                                    </tbody>
                                    </form>
                                </table>



                     </div>
                      </div>
    
        <div class="row" style="margin:20px 0;">
            <div class="col-lg-6 col-lg-offset-3" style="margin-top: 20px; margin-bottom: 20px;">  
                <button class="btn btn-primary btn-lg btn-block" onclick="volver(<?php echo "$c" ?>)">Volver</botton>
            </div>
         </div> 


 <script>

  function volver(DNI_Alumno) {
    location.href = "agregaaviso.php?DNI_Alumno=" + DNI_Alumno;
  } 

 </script>


  <div class="clearfooter"></div>
  </div>

<?php
  include("zfooter.php");
 ?>


 </body>
</html>