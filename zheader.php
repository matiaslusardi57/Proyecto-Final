<?php

      session_start();

      if(isset($_SESSION['usuario'])){ ?>
<div class="row" style="height=50px; background-color: #F59E27; width=100%; text-align: right;">
	<div class="col-lg-12">
		<div class="col-lg-2 col-lg-offset-6" style="padding:0 0;">
			<a href="ingresar.php" class="btn btn-default btn-block" role="button" style="border-color: #fff; padding: 6px 0px; background-color: #F59E27; border-color: #F59E27;">
				<p style="font-size:12px; margin-bottom: 0;"><span class="glyphicon glyphicon-user" style="color: black;"></span> Perfil</p>
			</a> 
		</div>
		<div class="col-lg-2" style="padding:0 0;">
			<a href="contrasena.php" class="btn btn-default btn-block" role="button" style="border-color: #fff; padding: 6px 0px; background-color: #F59E27; border-color: #F59E27;">
				<p style="font-size: 12px; margin-bottom: 0;"><span class="glyphicon glyphicon-pencil" style="color: black;"></span> Cambiar Contraseña</p>
			</a> 
		</div>
		<div class="col-lg-2" style="padding:0 0;">
			<a href="cerrar_sesion.php" class="btn btn-default btn-block" role="button" style="border-color: #fff; padding: 6px 0px; background-color: #F59E27; border-color: #F59E27;">
				<p style="font-size: 12px; margin-bottom: 0;"><span class="glyphicon glyphicon-off" style="color: black;"></span> Cerrar Sesión</p>
			</a> 
		</div>
	</div>
</div>
<div class="wrapper">
	<div class="logo">
		<a href="index.php">
		<img src="img/es.png" height="175" width="175" alt="logo">
		</a>
	</div>		
	<nav>
		<a href="index.php"><b>Inicio</b></a>
		<a href="noticias.php"><b>Noticias</b></a>
		<a href="evento.php"><b>Eventos</b></a>
		<a href="balances.php"><b>Balances</b></a>
	    <a href="material.php"><b>Material</b></a>
		<a href="contacto.php"><b>Contacto</b></a>
		
	</nav>
</div>
<?php }
else { ?>
<div class="wrapper">
	<div class="logo">
		<a href="index.php">
		<img src="img/es.png" height="175" width="175" alt="logo">
		</a>
	</div>		
	<nav>
		<a href="index.php"><b>Inicio</b></a>
		<a href="noticias.php"><b>Noticias</b></a>
		<a href="evento.php"><b>Eventos</b></a>
		<a href="balances.php"><b>Balances</b></a>
	    <a href="material.php"><b>Material</b></a>
		<a href="contacto.php"><b>Contacto</b></a>
		<a href="ingresar.php"><b>Ingresar</b></a>
	</nav>
</div>
<?php } ?>	
