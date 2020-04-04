<?php 


include("includes/conectar.php");

$sql = "DELETE FROM examen WHERE idExamen = " . $_GET["idExamen"];
$rs = mysqli_query($db, $sql);


?>

  <script type="text/javascript">


<?php 
$c=$_GET["Cod_materia"];
$n=$_GET["Grado_Nro_grado"];
?>  


 location.href = "agregaexamen.php?Cod_materia=<?php echo $c; ?>&Grado_Nro_grado=<?php echo $n; ?>";



 </script>  
