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
    <div class="row">
        <div class="col-lg-12">
                <h1 style="text-align: center;">Recuperación de cuenta</h1>
        </div>  
    </div>

    <div class="container">
        <div class="row" style="margin-top: 25px;">
            <div class="col-lg-12">   
                <p><strong>Recupera tu cuenta</strong></p>     
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <div class="col-lg-12">
                <p>Ingrese su correo electrónico y recibirá un mail con la contraseña</p>
            </div>
        </div>
        <div class="row" style="text-align: center; margin-bottom: 55px;">
                <form action="claveperdida.php" method="post">
                    <div class="col-lg-12"> 
                        <div class="col-lg-12" style="padding-left: 0px;">
                            <input type="email" REQUIRED class="form-control" name="email" placeholder="Tu correo electrónico" style="text-align:center;">
                        </div>
                        <div class="col-lg-4 col-lg-offset-4" style="margin-top: 20px;">
                            <input type="submit" class="btn btn-success btn-block" value="Enviar" name="enviar">
                        </div>    
                    </div> 
                </form>  
        </div>
    </div>
       
</div>

<div class="clearfooter"></div>

</div>

<?php
  include("zfooter.php");
?>

<script src="js/jquery-1.12.2.js"></script>
<script src="js/bootstrap.min.js"></script>    
</body>
</html>
