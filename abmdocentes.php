<?php
  include("includes/conectar.php");
  require("includes/requiere_login.php");
  include("includes/funciones_utiles.php");

session_start();

  if(!isset($_SESSION["usuario"])){

    header("location:abmdocentes.php");
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>ABM Docentes</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="estilo.css">
  <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/site.webmanifest">
<link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="favicon/favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-config" content="favicon/browserconfig.xml">
<meta name="theme-color" content="#ffffff">
</head>

<header>
  <?php
    include("zheader.php");
   ?>
</header>
<body>

<div class="container">

<div class="container">
  <div class="col-lg-12" style="text-align:center; margin:20px 20px;">
    <h3>Listado de Docentes</h3>
  </div>
</div>
<div class="col-lg-6 col-lg-offset-3" style="margin-top: 20px; margin-bottom: 20px;">
    <button class="btn btn-success btn-lg btn-block" onclick="nueva()">Agregar Docente</botton>
</div>


<div class="container">
            
      <br /><br />
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                             <table class="table table-striped table-bordered table-hover" id="dataTables-addControls">
                                    <thead>
                                        <tr>
                                          <th>Editar</th>
                                            <th>DNI</th>
                                            <th>Nombre y Apellido</th>
                                            <th>Dirección</th>
                                            <th>Teléfono</th>
                                            <th>Borrar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$sql = "SELECT *
        FROM docente
       ";

$rs = mysqli_query($db, $sql);
if ( $rs ) {
  while ($r = mysqli_fetch_array($rs) ) {
?>
                                        <tr>
                                            <td class="sorting_1" style="text-align: center;">
                                            <button type="button" class="btn btn-warning"  onClick="editar(<?php echo $r["DNI_docente"] ?>)">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="color: #fff;">
                                            </button>
                                            </td>
                                            <td><?php  echo $r["DNI_docente"]; ?></td>
                                            
                                            <td><?php  echo $r["NombreApellido"]; ?></td>
                                            <td><?php  echo $r["Direccion"]; ?></td>
                                            <td><?php  echo $r["Telefono"]; ?></td>
                                            <td class="sorting_1" style="text-align: center;">
                                              <button type="button" class="btn btn-danger" onClick="borrar(<?php echo $r["DNI_docente"] ?>)">Borrar</button>
                                            </td>
                                        </tr>
<?php 
  }
}
?>
                                    </tbody>
                                </table>
                </div>
            </div>
</div>


<div class="col-lg-6 col-lg-offset-3" style="margin-top: 20px; margin-bottom: 20px;">  
      <button class="btn btn-primary btn-lg btn-block" onclick="volver()">Volver</botton>
</div>



    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>



    <script>
    $(document).ready(function() {
        $('#dataTables-addControls').dataTable();
    });

  function volver() {
    location.href = "paginaadmin.php";
  }  

  function borrar(DNI_docente) {
    location.href = "docenteborrar.php?DNI_docente=" + DNI_docente;
  }

  function editar(DNI_docente) {
    location.href = "docenteeditar.php?DNI_docente=" + DNI_docente;
  }

  function nueva() {
    location.href = "docentenueva.php";
  }
  
    </script>
 
<div class="clearfooter"></div>

</div>


<?php
  include("zfooter.php");
?>


 
</body>
</html>