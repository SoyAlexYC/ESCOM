<?php
include 'configBD.php';
if (!$conexion) {
    $respAX["code"] = 0;
    $respAX["log"] = date("Y-m-d H:i:s");
    $infGru = [];
    $infGru[] = "No hay conexion";
    $respAX["data"] = $infGru;
    echo json_encode($respAX);
    exit;
}
$sql1 = "SELECT * from hora";
$resultado1 = mysqli_query($conexion, $sql1);
$respAX = [];
if ($resultado1->num_rows != 0) {
    $respAX["code"] = 1;
    $respAX["log"] = date("Y-m-d H:i:s");
    $infGru = [];
    while ($fila = mysqli_fetch_assoc($resultado1)) {
        $infGru[] = $fila;
    }
    $respAX["data"] = $infGru;
    echo json_encode($respAX);
} else {
    $respAX["code"] = 0;
    $respAX["log"] = date("Y-m-d H:i:s");
    $infGru = [];
    $infGru[] = "No hay horas";
    $respAX["data"] = $infGru;
    echo json_encode($respAX);
}
?>