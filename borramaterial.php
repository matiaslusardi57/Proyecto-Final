<?php 


include("includes/conectar.php");

$sql = "DELETE FROM materiales WHERE idMaterial = " . $_GET["idMaterial"];
$rs = mysqli_query($db, $sql);
?>



  <script type="text/javascript">


<?php 
$c=$_GET["Cod_materia"];
$n=$_GET["Grado_Nro_grado"];
?>  


 location.href = "agregamaterial.php?Cod_materia=<?php echo $c; ?>&Grado_Nro_grado=<?php echo $n; ?>";



 </script>  