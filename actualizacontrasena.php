<?php
include("includes/conectar.php");
require("includes/requiere_login.php");
include("includes/funciones_utiles.php");


$usuario = $_SESSION['usuario'];




$sql = "SELECT * FROM `padre` WHERE DNI_padre='$usuario' AND Contrasena='".$_POST["pass12"]."' ";

$rs = mysqli_query($db, $sql);


if (is_object($rs) && $rs->num_rows > 0) {  
        
        $paa=$usuario;

   $coo=$_POST["pass22"];

   $ux="UPDATE `padre` SET `Contrasena` = $coo

    WHERE `DNI_padre` = $paa";

    $rss = mysqli_query($db, $ux);
    

     Header("Location: Ingresar1.php?p=1");

} 
else {

    $sq = "SELECT * FROM `docente` WHERE DNI_docente='$usuario' AND Contrasena='".$_POST["pass12"]."' ";

        $r = mysqli_query($db, $sq) ;

        if (is_object($r) && $r->num_rows > 0) {
            
               $paaa=$usuario;

                $cooo=$_POST["pass22"];

                $uxx="UPDATE `docente` SET `Contrasena` = $cooo

                WHERE `DNI_docente` = $paaa";   

                $rsss = mysqli_query($db, $uxx);

                Header("Location: docente1.php?d=1");   
        
        
    } 
    else {

  $s = "SELECT * FROM `administrador` WHERE DNI_admin='$usuario' AND Contrasena='".$_POST["pass12"]."' ";

            $rrr = mysqli_query($db, $s) or die(mysql_error($db));


                        if (is_object($rrr) && $rrr->num_rows > 0) {
            
               $ssss=$usuario;

                $aaaa=$_POST["pass22"];

                $qqq="UPDATE `administrador` SET `Contrasena` = $aaaa

                WHERE `DNI_admin` = $ssss";   

                $www = mysqli_query($db, $qqq);

                Header("Location: inicioadm.php?c=1");


} else { 

          Header("Location: contrasena.php?q=1");

      }


}
}

?>