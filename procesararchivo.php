<?php 

include("includes/conectar.php");
require("includes/requiere_login.php");
include("includes/funciones_utiles.php");

$examen=$_GET["idExamen"];
$materia=$_GET["Cod_materia"];
$grado=$_GET["Grado_Nro_grado"];

if ($_FILES) {

	
	$carpeta = "uploads/";
	$destino = $carpeta .basename($_FILES['archivo']['name']);	
	move_uploaded_file($_FILES['archivo']['tmp_name'], $destino);
	if (($_FILES["archivo"]["type"] == "application/pdf") || ($_FILES["archivo"]["type"] == "application/msword") || ($_FILES["archivo"]["type"] == "application/vnd.ms-excel") || ($_FILES["archivo"]["type"] == "application/txt")) {
	$sql="  UPDATE examen SET Nota='$destino' 
			WHERE idExamen='$examen'
		 ";

		 
	$rsfoto=mysqli_query($db,$sql);	 

	?>
	<script type="text/javascript">
		location.href = "agregaexamen.php?Cod_materia=<?php echo $materia; ?>&Grado_Nro_grado=<?php echo $grado; ?>";
	</script>
<?php }
	else { ?>
		<script type="text/javascript">
		location.href = "agregaexamen.php?e=1&Cod_materia=<?php echo $materia; ?>&Grado_Nro_grado=<?php echo $grado; ?>";
		</script>
<?php	}
}
?>
	