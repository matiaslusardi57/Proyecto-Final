<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
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


<?php
$fecha=date("d-m-Y");
$hora= date("H :i:s");
$destino="contacto@escuelavillaamelia.esy.es"; /*"micorreo@dominio.com";*/
$asunto=$_POST["asunto"];
$desde='From:' .$_POST['mail'];
$comentario= "
\n
Nombre: $_POST[nombre]\n
Apellido: $_POST[apellido]\n
Email: $_POST[mail]\n
Telefono: $_POST[tel]\n
Consulta: $_POST[mensaje]\n
Enviado: $fecha a las $hora\n
\n
";
mail($destino,$asunto,$comentario,$desde);

?>

<div class="container">
	<div class="row" style="text-align: center; margin-top: 50px;">
		<h4> <?php echo "Su consulta ha sido enviada, en breve recibir&aacute; nuestra respuesta."; ?> </h4>
	</div>
</div>


<div class="clearfooter"></div>


<?php
  include("zfooter.php");
 ?>
	
</body>
</html>