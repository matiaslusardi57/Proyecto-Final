<?php


define('DB_HOST','localhost'); define('DB_USER','root');
define('DB_PASS',''); define('DB_NAME','va');
$GLOBALS['db'] = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

mysqli_set_charset($GLOBALS['db'],"utf8");
error_reporting(0);
?>