<?php
include 'configBD.php';

date_default_timezone_set("America/Mexico_City");

$sql = "SELECT * FROM alumno";

$result = mysqli_query($conexion, $sql);

$respAX = [];
$respAX["code"] = 1;
$respAX["log"] = date("Y-m-d H:i:s");
$infalumnos = [];

while($fila = mysqli_fetch_assoc($result))
{
    $infalumnos[] = $fila;
}

$respAX["data"] = $infalumnos;

echo json_encode($respAX);
?>