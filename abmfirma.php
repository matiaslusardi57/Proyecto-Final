<?php
include("includes/conectar.php");

$alumno=$_GET["DNI_Alumno"];
$padre=$_GET["DNI_padre"];
$f1=$_GET["firma1"];
$f2=$_GET["firma2"];
$f3=$_GET["firma3"];

$sql = "UPDATE `alumno/padre` set `firma1`= $f1, `firma2`= $f2, `firma3`= $f3
 		WHERE `Alumno_DNI_Alumno` = $alumno and `Padre_DNI_padre`= $padre";

$rs = mysqli_query($db, $sql);

?>

<script type="text/javascript"> 

location.href = "libreta.php?DNI_Alumno=<?php echo $alumno; ?>";

 </script>  