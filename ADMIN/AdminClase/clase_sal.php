<?php
include 'configBD.php';
if (!$conexion) {
    $respAX["code"] = 0;
    $respAX["log"] = date("Y-m-d H:i:s");
    $infMat = [];
    $infMat[] = "No hay conexion";
    $respAX["data"] = $infMat;
    echo json_encode($respAX);
    exit;
}
$sql1 = "SELECT * from salon";
$resultado1 = mysqli_query($conexion, $sql1);
$respAX = [];
if ($resultado1->num_rows != 0) {
    $respAX["code"] = 1;
    $respAX["log"] = date("Y-m-d H:i:s");
    $infMat = [];
    while ($fila = mysqli_fetch_assoc($resultado1)) {
        $infMat[] = $fila;
    }
    $respAX["data"] = $infMat;
    echo json_encode($respAX);
} else {
    $respAX["code"] = 0;
    $respAX["log"] = date("Y-m-d H:i:s");
    $infMat = [];
    $infMat[] = "No hay salones";
    $respAX["data"] = $infMat;
    echo json_encode($respAX);
}
?>