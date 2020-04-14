<?php 
include("includes/conectar.php");
require("includes/requiere_login.php");
include("includes/funciones_utiles.php");



   //indicamos los formatos que permitimos subir a nuestro servidor
   if (($_FILES["imagen"]["type"] == "image/gif")
   || ($_FILES["imagen"]["type"] == "image/jpeg")
   || ($_FILES["imagen"]["type"] == "image/jpg")
   || ($_FILES["imagen"]["type"] == "image/png"))
   {

      $carpeta = "img/";
      $destino = $carpeta .basename($_FILES['imagen']['name']);  
      move_uploaded_file($_FILES['imagen']['tmp_name'], $destino);


  $sql = "INSERT INTO noticias (Fecha, Titulo, Contenido, Imagen)
          VALUES ('". $_POST["fecha"]."',
                  '". $_POST["titulo"]."',
                  '". $_POST["contenido"]."',
                  '". $destino."'
                )" ; 

  $rs = mysqli_query($db, $sql);


  header('Location: abmnoticias.php');

    }
    else
    {
       //si no cumple con el formato
       header('Location: abmnoticias.php?e=1');
    }

?>