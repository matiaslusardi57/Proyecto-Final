<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");

$admin = recuperar_admin($_SESSION['usuario']);

session_start();

  if(!isset($_SESSION['usuario'])){
    
    header("location:paginaadmin.php");
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>ABM</title> 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="estilo.css">
  <style> 
#panel, #flip {
  padding: 5px;
  font-size: 18px;
  text-align: center;
  background-color: white;
  border-radius: 3px;
}
#panel {
  padding: 50px;
  display: none;
}
</style>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideDown(1000);
  });
});
</script>
  <script language=javascript>
  function ventanasecundaria (idNoticia) {
    window.open("noticias.php?");
  }
  </script>
</head>

<header>
  <?php
    include("zheader.php");
   ?>
</header>
<body>

<div class="container">

 <div style="text-align:center;">
    <h2>Noticias</h2>
</div>

<br>
 <div class="row">
    <div class="col-lg-10 col-lg-offset-1">
      <table class="table table-striped table-bordered table-hover" id="dataTables-addControls">
          <thead>
           <tr>
            <th class="col-lg-2">Fecha Publicacion</th>
            <th>Titulo</th>
            <th style="text-align: center;">Borrar</th>
            </tr>
          </thead>
        <tbody>
              <?php 
              $fechaActual = date('d-m-Y');
              $sql = "SELECT * FROM `noticias` ORDER BY `idNoticia` ASC";
              $rs = mysqli_query($db, $sql);
              if ( $rs ) {
                while ($r = mysqli_fetch_array($rs) ) {
              ?>

            <tr>
               <td><?php  echo $r["Fecha"]; ?></td>
                <td><a href="javascript:ventanasecundaria('<?php echo $r["idNoticia"]; ?>')"><?php  echo $r["Titulo"]; ?></a></td>
                <td class="sorting_1" style="text-align: center;">
                <button type="button" class="btn btn-danger" onClick="borrar(<?php echo $r["idNoticia"] ?>)">Borrar</button>
                </td>
            </tr>
                <?php 
                  }
                }
                ?>
        </tbody>
      </table>
                     <?php
                      if (isset($_GET["e"])) {
                      if($_GET["e"]==1) {
                    ?><div style="text-align: center;">
                    <h4><span><b><?php  echo "Error al subir Imagen, admite formato gif, jpeg, jpg y png";?></b></span></h4> 
                    </div>
                          <?php
                        }}
                      ?>
<div id="flip"> 
          <div class="col-lg-12">
            <button class="btn btn-success btn-lg btn-block">Agregar Noticia</botton>
          </div>
      </div>
    </div>
</div>
<div id="panel">
          <div class="row">
            <div class="col-lg-12">          
            <table class="table table-striped table-bordered table-hover" id="dataTables-addControls">
            <thead>
                <tr>
                  <th class="hidden">Fecha</th>
                  <th style="text-align:center;">Titulo</th>
                  <th style="text-align:center;">Contenido</th>
                  <th style="text-align:center;">Imagen</th>
                  <th style="text-align:center;">Confirmar</th>
                </tr>
          </thead>

      <form name="form1" method="post" action="altanoticia.php" enctype="multipart/form-data">
            <tbody>
              <tr>
                <td class="hidden"> 
                  <label for="fecha"></label>
                  <input type="text" name="fecha" id="fecha" value="<?php echo $fechaActual ?>"> 
                </td>
                <td>
                  <label for="titulo"></label>
                  <textarea type="text" name="titulo" id="titulo" style="margin: 0px; width: 225px; height: 192px;" placeholder="Titulo" required></textarea>
                </td>
                <td>
                  <label for="contenido"></label>
                  <textarea name="contenido" id="contenido" style="margin: 0px; width: 358px; height: 356px;" placeholder="Ingrese el cuerpo de la noticia..." required=""></textarea> 
                </td>
                <td>
                      <br><br>
                      <label for="imagen" style="text-align: center;">Foto</label>
                      <div>
                        <input type="file" id="imagen" name="imagen" multiple required="">
                      </div>
                </td>
                   <td>
                  <input type="submit" value="Confirmar" class="btn btn-primary" name="confirmar" id="confirmar"style="text-align: center; margin-top: 70px; margin-bottom: 20px">
                  </td>
              </tr>
         </tbody>
        </form>
      </table>



        </div>
    </div>
</div>

<script>
  function borrar(idNoticia) {
    location.href = "borrarnoticia.php?idNoticia=" + idNoticia;
  }
</script>

  <div class="row" style="margin:20px 0;">
    <div class="col-lg-offset-5 col-lg-2">
      <a href="contenido.php" role="button" class="btn btn-default btn-lg btn-block"> 
        <p style="margin: 3px 0;">Volver</p>
      </a>
    </div>
  </div> 


<div class="clearfooter"></div>

 </div>

<?php
  include("zfooter.php");
?>

	
</body>
</html>