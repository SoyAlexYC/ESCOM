<?php
include 'configBD.php';

date_default_timezone_set("America/Mexico_City");

$sql = "SELECT * FROM curso";

$result = mysqli_query($conexion, $sql);

$respAX = [];
$respAX["code"] = 1;
$respAX["log"] = date("Y-m-d H:i:s");
$infcursos = [];

while($fila = mysqli_fetch_assoc($result))
{
    $infcursos[] = $fila;
}

$respAX["data"] = $infcursos;

echo json_encode($respAX);
?>