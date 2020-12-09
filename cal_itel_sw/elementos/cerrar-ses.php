<?php 
session_start();

$var_sesion = $_SESSION['alumno'];

if($var_sesion == null || $var_sesion == ''){
    header('Location: in-sesion.php');
}

session_destroy();
header('Location: in-sesion.php');
?>