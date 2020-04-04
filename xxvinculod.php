<?php 
include("includes/conectar.php");

$grado=$_GET["Grado_Nro_grado"];

$materia=$_GET["Cod_materia"];

$docente=$_GET["DNI_docente"];


$consulta="DELETE FROM `vinculo` WHERE Grado_Nro_grado = $grado and Docente_DNI_docente = $docente and Materia_Cod_materia = $materia";

$resultado=mysqli_query($db,$consulta);




 $ux="UPDATE `materia` SET `Docente_DNI_docente` = 0

    WHERE `Cod_materia` = $materia and `Grado_Nro_grado` = $grado";

    $consultaa = mysqli_query($db, $ux);

 header('Location: vinculoeliminardoc.php');

 ?>