<?php 
include("includes/conectar.php");
require("includes/requiere_login.php");
include("includes/funciones_utiles.php");

$dni = $_POST["dni"];
$nombre = $_POST["nombre"];

$query = "SELECT `cn1`,`cn2`,`cn3` FROM `alumno/padre` WHERE `Alumno_DNI_Alumno` = $dni";


$result = mysqli_query($db, $query);
		
if ($result) {
			
  	while ($r = mysqli_fetch_array($result) ) {
		
		if ($r["cn1"]==0) {
			
			$sql = "UPDATE `alumno/padre` set `cn1`= 1 WHERE `Alumno_DNI_Alumno` = $dni";

			$rs = mysqli_query($db, $sql);

		}	elseif ($r["cn1"]==1 && $r["cn2"]==0) {
			
				$sql = "UPDATE `alumno/padre` set `cn2`= 1 WHERE `Alumno_DNI_Alumno` = $dni";

					$rs = mysqli_query($db, $sql);

		} 	elseif ($r["cn1"]==1 && $r["cn2"]==1 && $r["cn3"]==0 ) {

				$sql = "UPDATE `alumno/padre` set `cn3`= 1 WHERE `Alumno_DNI_Alumno` = $dni";

					$rs = mysqli_query($db, $sql);
			
		}

	}

}

?>

<script type="text/javascript">

location.href = "notasGrados.php?nombre=<?php echo $nombre; ?>";

</script>  
