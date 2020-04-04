<?php
$fecha=date("d-m-Y");
$hora= date("H :i:s");
$destino="contacto@escuelavillaamelia.esy.es"; /*"micorreo@dominio.com";*/
$asunto="Clave perdida";
$desde='From:' .$_POST['email'];
$comentario= "
\n
Email: $_POST[email]\n
Enviado: $fecha a las $hora\n
\n
";
mail($destino,$asunto,$comentario,$desde);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Seguimiento</title>
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

<div id="todo">
<div class="container-fluid">
    <!-- Encabezado -->

    <div class="container">
        
        <div class="row" style="margin-top: 20px;">
            <div class="col-xs-12">
                <p>En breve recibira un mail para restrablecer su contraseña</p>
            </div>
        </div>
       	<div class="col-lg-6 col-lg-offset-3" style="margin-top: 20px; margin-bottom: 20px;">  
            <button class="btn btn-primary btn-lg btn-block" onclick="volver()">Volver al inicio</botton>
        </div>
    </div>
       
</div>

 <script>
    $(document).ready(function() {
        $('#dataTables-addControls').dataTable();
    });

  function volver() {
    location.href = "index.php";
  }  
  
    </script>

<div class="clearfooter"></div>

</div>

<?php
  include("zfooter.php");
?>

<script src="js/jquery-1.12.2.js"></script>
<script src="js/bootstrap.min.js"></script> 
</body>
</html>
