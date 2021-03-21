<?php 
include("includes/conectar.php");

$i = 0;

if (isset($_POST["nota1"]))
{
	foreach ( $_POST["nota1"] as $N1 )
	{
		$dni = $_POST["dni"][$i];
		$materia = $_POST["cod_materia"][$i];
		$query = "SELECT * FROM `libreta` 
				  WHERE `DNI_Alumno` = $dni and `Cod_materia`= $materia";
		$result = mysqli_query($db, $query);
		
		if (mysqli_num_rows($result) > 0)
		{
			$sql = "UPDATE libreta set `N1`= $N1
 				    WHERE `DNI_Alumno` = $dni and `Cod_materia`= $materia";

			$rs = mysqli_query($db, $sql);
		}
		else
		{
			$sql = "INSERT INTO libreta (DNI_Alumno, Cod_materia, N1)
       		VALUES ('". $_POST["dni"][$i]."',
					'". $_POST["cod_materia"][$i]."',
					'". $N1."'
					)" ;
			$rs = mysqli_query($db, $sql);
		}
		
		$i = $i + 1;
	}
}
else if (isset($_POST["nota2"]))
{
	foreach ( $_POST["nota2"] as $N2 )
	{
		$dni = $_POST["dni"][$i];
		$materia = $_POST["cod_materia"][$i];
		$query = "SELECT * FROM `libreta` 
				  WHERE `DNI_Alumno` = $dni and `Cod_materia`= $materia";
		$result = mysqli_query($db, $query);
		
		if (mysqli_num_rows($result) > 0)
		{
			$sql = "UPDATE libreta set `N2`= $N2
 				    WHERE `DNI_Alumno` = $dni and `Cod_materia`= $materia";

			$rs = mysqli_query($db, $sql);
		}
		else
		{
			$sql = "INSERT INTO libreta (DNI_Alumno, Cod_materia, N2)
       		VALUES ('". $_POST["dni"][$i]."',
					'". $_POST["cod_materia"][$i]."',
					'". $N2."'
					)" ;
			$rs = mysqli_query($db, $sql);
		}
		
		$i = $i + 1;
	}
}
elseif (isset($_POST["nota3"]))
{
	foreach ( $_POST["nota3"] as $N3 )
	{
		$dni = $_POST["dni"][$i];
		$materia = $_POST["cod_materia"][$i];
		$query = "SELECT * FROM `libreta` 
				  WHERE `DNI_Alumno` = $dni and `Cod_materia`= $materia";
		$result = mysqli_query($db, $query);
		
		if (mysqli_num_rows($result) > 0)
		{
			$sql = "UPDATE libreta set `N3`= $N3
 				    WHERE `DNI_Alumno` = $dni and `Cod_materia`= $materia";

			$rs = mysqli_query($db, $sql);
		}
		else
		{
			$sql = "INSERT INTO libreta (DNI_Alumno, Cod_materia, N3)
       		VALUES ('". $_POST["dni"][$i]."',
					'". $_POST["cod_materia"][$i]."',
					'". $N3."'
					)" ;
			$rs = mysqli_query($db, $sql);
		}
		
		$i = $i + 1;
	}
}
?>

<script type="text/javascript"> 

<?php 
$c=$_GET["Cod_materia"];
$n=$_GET["Grado_Nro_grado"];

?>

location.href = "agregalibreta.php?Cod_materia=<?php echo $c; ?>&Grado_Nro_grado=<?php echo $n; ?>";
//header('Location: abmlibreta.php');


 </script>  
    

