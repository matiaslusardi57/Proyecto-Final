<?php 

include("includes/conectar.php");
require("includes/requiere_login.php");
include("includes/funciones_utiles.php");


	$carpeta = "uploads/";
	$destino = $carpeta .basename($_FILES['archivo']['name']);	
	move_uploaded_file($_FILES['archivo']['tmp_name'], $destino);

  $grado=$_POST["grado"];
  $materia=$_POST["materia"];
  $Descripcion=$_POST["Descripcion"];
 

	$sql = "INSERT INTO materiales (Grado_Nro_grado, Materia_Cod_materia, Descripcion, Archivo)
 			VALUES ('". $grado."',
 		 			'". $materia."',
			       	'". $Descripcion."',
					'". $destino."'
					)" ; 

$rs = mysqli_query($db, $sql);		 

?>
<script type="text/javascript">

location.href = "agregamaterial.php?Cod_materia=<?php echo $materia; ?>&Grado_Nro_grado=<?php echo $grado; ?>";

</script>