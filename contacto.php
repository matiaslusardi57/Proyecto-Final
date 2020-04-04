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

<section class="titulo" >
        <div class="container text-center">
            <div class="center wow fadeInDown">
                <h3 class="text-uppercase text-center">Ponete en contacto</h3>
				<p class="lead">
					Ac&aacute; estamos para responder todas tus dudas e inquietudes. 
				</p>
            </div>
		</div>	
</section>

<section id="contact-page">
        <div class="container" id="ancla">
            <div class="row contact-wrap"> 
                <form class="contact-form" id="form1" method="post" action="mandarconsulta.php">
                    <div class="col-sm-10 col-sm-offset-1">
						<div class="form-group">
                            <label>Nombre</label>
                            <input REQUIRED id="nombre" name="nombre" type="text" size="30" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Apellido</label>
                            <input REQUIRED id="apellido" name="apellido" type="text" size="30" class="form-control">
                        </div>
						<div class="form-group">		
							<label>Email</label>
							<input REQUIRED id="mail" name="mail" type="text" size="30" class="form-control" >
                        </div>
						<div class="form-group">		
							<label>Tel&eacute;fono</label>
							<input REQUIRED id="tel" name="tel" type="text" size="30" class="form-control" >
						</div>
						<div class="form-group">		
							<label>Asunto</label>
							<input REQUIRED id="asunto"  name="asunto" type="text" size="30" class="form-control">
						</div> 
						<div class="form-group">		
							<label>Mensaje</label>
							<textarea REQUIRED id="mensaje"  name="mensaje" class="form-control" style="resize:none; height:100px;"></textarea>
						</div>
                    </div>					
                    
					<div id="divErrores" class="col-lg-10 col-lg-offset-1" style="display:none">
						<div class="form-group text-red">
							<p>Por favor, complet&aacute; los campos requeridos.</p>
						</div>
					</div>
					<div class="col-lg-10 col-lg-offset-1" style="margin-top: 20px;">
						<div class="form-group">
						  	<button type="submit" name="submit" class="btn btn-success btn-block btn-lg" >Enviar</button>					   
						</div>
					</div>	
                </form> 
     
			</div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->



<div class="clearfooter"></div>


<?php
  include("zfooter.php");
 ?>
	
</body>
</html>