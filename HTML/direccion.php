<?php 

include 'configBD.php';

$uname = $_POST["uname"];
$pwd = $_POST["pswd"];
$sql1 = "SELECT * from alumno where Boleta = $uname";
$sql2 = "SELECT * from alumno where Contrasena = '$pwd'";
$resultado1 = mysqli_query($conexion, $sql1);
$resultado2 = mysqli_query($conexion, $sql2);
if(($resultado1->num_rows != 0) && ($resultado2->num_rows != 0)){
$R1= mysqli_fetch_assoc($resultado1);
$R2= mysqli_fetch_assoc($resultado2);



if($uname == $R1["Boleta"] && $pwd == $R2["Contrasena"] ){
    echo("Estas dentro JI JI JI JA");
    session_start();
$_SESSION["usuario"] = $R1["Boleta"];

    header("Location: /ESCOM/HTML/SEARCH.php");
}
else
{
    echo("Botate a la verga");
    //header("Location: /ESCOM/HTML/paginaError.html");
    //exit();
    
}}else{
  echo("Botate a la verga");
}
?>
