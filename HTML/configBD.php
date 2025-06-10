<?php 

//Agregar ------include 'configBD.php';------- 
//  para archivos donde se requiera conexion a la base de datos 

$servidorBD = "localhost";
$usuarioBD ="admin";
$contraBD ="123456";
$nombBD ="escom";

$conexion = mysqli_connect($servidorBD,$usuarioBD,$contraBD,$nombBD);
if(mysqli_connect_error()){
    die("problemas con la conexion". mysqli_connect_error());
}else{
    mysqli_query($conexion, "SET NAMES 'utf8'");
}

?>
