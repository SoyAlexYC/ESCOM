<?php
include 'configBD.php';

date_default_timezone_set("America/Mexico_City");

$sql = "SELECT * FROM profesor";

$result = mysqli_query($conexion, $sql);

$respAX = [];
$respAX["code"] = 1;
$respAX["log"] = date("Y-m-d H:i:s");
$infprofes = [];

while($fila = mysqli_fetch_assoc($result))
{
    $infprofes[] = $fila;
}

$respAX["data"] = $infprofes;

echo json_encode($respAX);
?>