<?php
include 'configBD.php';

date_default_timezone_set("America/Mexico_City");

$sql = "SELECT * FROM grupo";

$result = mysqli_query($conexion, $sql);

$respAX = [];
$respAX["code"] = 1;
$respAX["log"] = date("Y-m-d H:i:s");
$infgrupos = [];

while($fila = mysqli_fetch_assoc($result))
{
    $infgrupos[] = $fila;
}

$respAX["data"] = $infgrupos;

echo json_encode($respAX);
?>