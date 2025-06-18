<?php
include 'configBD.php';

date_default_timezone_set("America/Mexico_City");

$sql = "SELECT * FROM materia";

$result = mysqli_query($conexion, $sql);

$respAX = [];
$respAX["code"] = 1;
$respAX["log"] = date("Y-m-d H:i:s");
$infmaterias = [];

while($fila = mysqli_fetch_assoc($result))
{
    $infmaterias[] = $fila;
}

$respAX["data"] = $infmaterias;

echo json_encode($respAX);
?>