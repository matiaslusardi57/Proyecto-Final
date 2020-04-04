<?php
  include("includes/conectar.php");
  include("includes/funciones_utiles.php");

$admin = recuperar_admin($_SESSION['usuario']);

session_start();

  if(!isset($_SESSION['usuario'])){
    
    header("procesavinculom.php");
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio ADM</title>
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

<div id="todo">

<?php 

$docente=$_POST["padre"];
$a=$_POST["alumno"];

$grado = substr($a, 0, 1);

$materia = substr($a, 1, 2);

//echo "$docente<br>";
//echo "$grado<br>";
//echo "$materia<br>";

$consulta="insert into `vinculo` (`Grado_Nro_grado`,`Docente_DNI_docente`,`Materia_Cod_materia`) values ('$grado','$docente','$materia')";

$resultado=mysqli_query($db,$consulta);




 $ux="UPDATE `materia` SET `Docente_DNI_docente` = $docente

    WHERE `Cod_materia` = $materia and `Grado_Nro_grado` = $grado";

    $consultaa = mysqli_query($db, $ux);

 
 ?>

   <br><br><br><br><br>
   <div class="row">  
        <div style=" margin-top: 50px; margin-bottom: 50px;">
              <h1 style="text-align:center;">Vinculación Exitosa</h1>
        </div>
    </div>
         <div class="row">
         <div class="col-lg-offset-5 col-lg-2">
            <a href="listadom.php"> <button type="button" class="btn btn-default btn-lg btn-block">Volver</button></a>
        
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