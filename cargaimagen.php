<?php 
include("includes/conectar.php");
require("includes/requiere_login.php");
include("includes/funciones_utiles.php");

 // Recibo los datos de la imagen
$nombre_img = $_FILES['imagen']['name'];
$tipo = $_FILES['imagen']['type'];
$tamano = $_FILES['imagen']['size'];
$noticia=$_GET["idNoticia"];

//Si existe imagen y tiene un tamaño correcto
if (($nombre_img == !NULL)

  ($_FILES['imagen']['size'] ;
{
   //indicamos los formatos que permitimos subir a nuestro servidor
   if (($_FILES["imagen"]["type"] == "image/gif")
   || ($_FILES["imagen"]["type"] == "image/jpeg")
   || ($_FILES["imagen"]["type"] == "image/jpg")
   || ($_FILES["imagen"]["type"] == "image/png"))
   {

      $carpeta = "img/";
      $destino = $carpeta .basename($_FILES['imagen']['name']);  
      move_uploaded_file($_FILES['imagen']['tmp_name'], $destino);

      $sql="  UPDATE noticias SET Imagen='$destino' 
      WHERE idNoticia='$noticia'";

      // Ruta donde se guardarán las imágenes que subamos
     // $directorio = $_SERVER['DOCUMENT_ROOT'].'/intranet/uploads/';
      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
     // move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
    }
    else;
    {
       //si no cumple con el formato
       echo "No se puede subir una imagen con ese formato ";
    }
}&
else&nbsp;
{
   //si existe la variable pero se pasa del tamaño permitido
   if($nombre_img == !NULL) echo "La imagen es demasiado grande ";&nbsp;
}
?>
