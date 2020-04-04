<?php

  include("includes/conectar.php");
  include("includes/funciones_utiles.php");

session_start();

session_destroy();


Header("Location: index.php");
?>