<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");


  $padre = recuperar_padre($_SESSION['usuario']);
  $nom_padre = $padre['NombreApellido'];
  $dni_p = $padre['DNI_padre'];
  $hijo = recuperar_hijo($padre['DNI_padre']);

 ?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Libreta</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="estilo.css">
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

<div id="todo">
 <?php
$c=$_GET["DNI_Alumno"];

$hij=recuperar_h("$c");

 ?>


<h1 style="text-align:center;">Libreta Escolar</h1>
<div class="container">
<div class="container">
  <div class="table table-bordered">
    <table class="table">
      <tr>
        <td class="active">
            <div class="col-lg-3">
              <label style="text-align: left;">Alumno:  <?php echo $hij['NombreApellido'] ?></label>
            </div>
            <div class="col-lg-1 col-lg-offset-8">
              <label style="text-align: right;">Grado:  <?php echo $hij['Grado_Nro_grado'] ?>°</label>
            </div>
        </td>
      </tr>
    </table>
  </div>
</div>
<?php
$consulta="SELECT m.`Descripcion`, l.`N1`, l.`N2`, l.`N3`
FROM `materia` m
inner JOIN `alumno` a
on m.`Grado_Nro_grado` = a.`Grado_Nro_grado`
left JOIN `libreta` l
on a.`DNI_Alumno` = l.`DNI_Alumno` and m.`Cod_materia` = l.`Cod_materia`
WHERE a.`DNI_Alumno` = $c";
$resultado=mysqli_query($db, $consulta);
?>
<div class="container">
  <div class="table table-bordered">
    <table class="table">
      <tr>
        <td class="active col-lg-3"><label style="text-align: left;"><h4>Asignaturas</h4></label></td>
        <td class="active col-lg-2" style="text-align: center;"><label><h4>1° Trimestre</h4></label></td>
        <td class="active col-lg-2" style="text-align: center;"><label><h4>2° Trimestre</h4></label></td>
        <td class="active col-lg-2" style="text-align: center;"><label><h4>3° Trimestre</h4></label></td>
        <td class="active col-lg-3" style="text-align: center;"><label><h4>Promedio</h4></label></td>
      </tr>

      <tr>
        <div class="row">
          <?php
            $promedio_gral = 0;
            $cont = 0;
            while (($fila=mysqli_fetch_row($resultado))==true) {
              $promedio = ($fila[1] + $fila[2] + $fila[3]);
              $promedio_gral = $promedio_gral + $promedio;
              $promedio = $promedio/3;
              $cont = $cont + 1;
          ?>
          <th class="warning"><?php echo $fila[0]?></th>
          <th class="warning" style="text-align: center;"><?php echo $fila[1]?></th>
          <th class="warning" style="text-align: center;"><?php echo $fila[2]?></th>
          <th class="warning" style="text-align: center;"><?php echo $fila[3]?></th>
          <th class="warning" style="text-align: center;"><?php echo $promedio?></th>            
      </tr>
      <?php 
        ;}
         $promedio_gral =  $promedio_gral/$cont; 
      ?>
    </table>
  </div>
</div>
<div class="container">
  <div class="table table-bordered">
    <table class="table">
      <tr>
        <td class="active">
            <div class="col-lg-3">
              <label style="text-align: left;">Promedio General: <?php echo $promedio_gral?></label>
            </div>
        </td>
    </table>
  </div>
</div>
<?php
$consulta="SELECT `firma1`,`firma2`,`firma3`,`fecha` FROM `alumno/padre` WHERE `Alumno_DNI_Alumno`=$c AND `Padre_DNI_padre` = $dni_p";
$rs=mysqli_query($db, $consulta);
if ( $rs ) {
  while ($r = mysqli_fetch_array($rs) ) {
?>
<div class="container">
  <div class="table table-bordered">
    <table class="table">
      <tr>
        <td class="active">
            <div class="col-lg-3">
              <label style="text-align: left;">Conformidad Trimestral:</label>
            </div>
        </td>
        <td class="active" style="text-align: center;">
          <div class="col-lg-2">
              <label style="text-align: center;" class="btn">
                <?php  if ($r["0"]==1) {
                  ?>
                  <input name="firma1" id="firma1" class="hidden" value="<?php echo $r["0"]; ?>"><b> Firma: <?php echo "$nom_padre"; ?></label> 
                <?php
                } else{ ?>
                  <input name="firma1" id="firma1" type="checkbox" value="<?php echo $r["0"]; ?>"><b> Firma</label>
                <?php
                } ?>
            </div>
        </td>
        <td class="active" style="text-align: center;">
          <div class="col-lg-2">
              <label style="text-align: center;" class="btn">
                <?php  if ($r["1"]==1) {
                  ?>
                  <input name="firma2" id="firma2" class="hidden" value="<?php echo $r["1"]; ?>"><b> Firma: <?php echo "$nom_padre"; ?></label>  
                <?php
                } else{ ?>
                  <input name="firma2" id="firma2" type="checkbox" value="<?php echo $r["1"]; ?>"><b> Firma</label>
                <?php
                } ?>
          </div>
        </td>
        <td class="active" style="text-align: center;">
          <div class="col-lg-2">
              <label style="text-align: center;" class="btn">
                <?php  if ($r["2"]==1) {
                  ?>
                  <input name="firma3" id="firma3" class="hidden" value="<?php echo $r["2"]; ?>"><b> Firma: <?php echo "$nom_padre"; ?></label> 
                <?php
                } else{ ?>
                  <input name="firma3" id="firma3" type="checkbox" value="<?php echo $r["2"]; ?>"><b> Firma</label>
                <?php
                } ?>
          </div>
        </td>
        <?php
            $array_fecha = explode(" ", $r["3"]);
            $a_f = $array_fecha[0];
            $fecha = explode("-", $a_f);
            $f = $fecha[2] . '/' . $fecha[1] . '/' . $fecha[0];
        ?>
        <td class="active" style="text-align: center;">
          <div class="col-lg-2">
            <b>Fecha: <?php echo "$f"; ?>
          </div>
        </td>
    </table>
  </div>
</div>
<?php 
  }
}
?>
<div class="row" style="margin:20px 0;">
  <div class="col-lg-offset-4 col-lg-2">
    <button type="button" class="btn btn-primary btn-sm btn-block" onclick="history.back()">Volver</button>
  </div>
    <div class="col-lg-2">
    <button type="button" class="btn btn-success btn-sm btn-block" onclick="guardafirma(<?php echo $hij["DNI_Alumno"].','.$padre['DNI_padre'] ?>,firma1.value,firma2.value,firma3.value)">Guardar</button>
  </div>
</div> 
<div class="clearfooter"></div>

<script type="text/javascript">
  
  function guardafirma(DNI_Alumno,DNI_padre,firma1,firma2,firma3) {
    location.href = "abmfirma.php?DNI_Alumno=" + DNI_Alumno + "&DNI_padre=" + DNI_padre + "&firma1=" + firma1 + "&firma2=" + firma2 + "&firma3=" + firma3;
    }
</script>

</div>
<?php
  include("zfooter.php");
?>
<script src="js/jquery-1.12.2.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
  $("#firma1").click(function(){
    if($("#firma1").val()==0)
    {
      $("#firma1").val(1);
    }
  })

  $("#firma2").click(function(){
    if($("#firma2").val()==0)
    {
      $("#firma2").val(1);
    }
  })

  $("#firma3").click(function(){
    if($("#firma3").val()==0)
    {
      $("#firma3").val(1);
    }
  })
</script>
</body>
</html>
