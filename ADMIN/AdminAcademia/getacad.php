<?php
include 'configBD.php';

date_default_timezone_set("America/Mexico_City");

$sql = "SELECT * FROM academia";

$result = mysqli_query($conexion, $sql);

$respAX = [];
$respAX["code"] = 1;
$respAX["log"] = date("Y-m-d H:i:s");
$infacad = [];

while($fila = mysqli_fetch_assoc($result))
{
    $infacad[] = $fila;
}

$respAX["data"] = $infacad;

echo json_encode($respAX);
?>