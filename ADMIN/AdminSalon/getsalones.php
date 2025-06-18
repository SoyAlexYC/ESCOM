<?php
include 'configBD.php';

date_default_timezone_set("America/Mexico_City");

$sql = "SELECT * FROM salon";

$result = mysqli_query($conexion, $sql);

$respAX = [];
$respAX["code"] = 1;
$respAX["log"] = date("Y-m-d H:i:s");
$infsalones = [];

while($fila = mysqli_fetch_assoc($result))
{
    $infsalones[] = $fila;
}

$respAX["data"] = $infsalones;

echo json_encode($respAX);
?>