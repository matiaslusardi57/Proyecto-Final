<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");

session_start();

  if(!isset($_SESSION["usuario"])){

    header("location:edicionexamenterminada.php");
  }

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Seguimiento</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="stylesheet" href="js/themes/smoothness/jquery-ui.css">
	<script src="js/jquery-1.12.2.js"></script>
    <script src="js/bootstrap.min.js"></script>  
    <script src="js/jquery-ui.js"></script>
    <script>
    $.datepicker.regional['es'] = {
	 closeText: 'Cerrar',
	 prevText: '<Ant',
	 nextText: 'Sig>',
	 currentText: 'Hoy',
	 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
	 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
	 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
	 weekHeader: 'Sm',
	 dateFormat: 'dd/mm/yy',
	 firstDay: 1,
	 isRTL: false,
	 showMonthAfterYear: false,
	 yearSuffix: ''
	 };
	 $.datepicker.setDefaults($.datepicker.regional['es']);
  	$(function() {
    $( "#datepicker" ).datepicker();
  	});
	</script>
</head>

<?php
$id = $_POST['id'];
$grado = $_POST['grado'];
$materia = $_POST['materia'];
$numero = $_POST['numero'];
$fecha = $_POST['fecha'];
$temas = $_POST['temas'];


//Arma la instrucción SQL y luego la ejecuta
$sql = "UPDATE examen set Numero='$numero', Fecha_examen='$fecha', Descripcion='$temas', examen_grado='$grado', Materia_Cod_materia='$materia'
 		where idExamen='$id'
		";

mysqli_query($db, $sql);

//echo $sql;
?>

<script type="text/javascript">
location.href = "agregaexamen.php?Cod_materia=<?php echo $materia; ?>&Grado_Nro_grado=<?php echo $grado; ?>";
</script>  

// Cerrar la conexion

<?php
mysqli_close($db);
?>
<body>
</body>
</html>