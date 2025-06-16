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

$sql = "SELECT * FROM profesor "; //muestras todos y ps ya ves si seleccionas uno xdd.
$nombre = mysqli_query($conexion,$sql);
if ($nombre->num_rows == 0) {
    echo 'No se encontraron resultados';
} else {
    $respAX = [];
    $respAX["code"] = 1;
    $respAX["log"] = date("Y-m-d H:i:s");
    $infProf = [];
    while ($fila = mysqli_fetch_assoc($nombre)) {
        $infProf[] = $fila;
    }
    $respAX["data"] = $infProf;
    echo json_encode($respAX);
}
?>