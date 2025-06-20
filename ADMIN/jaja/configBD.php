<?php 

$servidorBD = "localhost";
$usuarioBD ="admin";
$contrasenaBD ="123456";
$nombreBD ="prodb";

$conexion = mysqli_connect($servidorBD,$usuarioBD,$contrasenaBD,$nombreBD);
if(mysqli_connect_error())
{
    die("problemas con la conexion". mysqli_connect_error());
}

?>