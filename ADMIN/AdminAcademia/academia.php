<?php
include 'configBD.php';

if (!$conexion) {
    http_response_code(500);
    echo json_encode(["error" => "Error de conexión"]);
    exit;
}
date_default_timezone_set("America/Mexico_City");
$nombre = $_REQUEST["nombre"];

$sql1 = "SELECT * FROM academia WHERE NomAcademia = '$nombre'";
$respAX = [];
$existe = mysqli_query($conexion, $sql1);
if ($existe->num_rows == 0) {
        $sql3 = "INSERT INTO academia (NomAcademia, Estatus) VALUES ('$nombre', 1)";
        $res2 = mysqli_query($conexion, $sql3);
        if ($res2) {
            $respAX["code"] = 1;
            $respAX["log"] = date("Y-m-d H:i:s");
            $respAX["data"] = "Se registró la academia: " . $nombre;
            echo json_encode($respAX);
        } else {
            $respAX["code"] = 0;
            $respAX["log"] = date("Y-m-d H:i:s");
            $respAX["data"] = "No fue posible ingresar esta academia";
            echo json_encode($respAX);
        }
} else {
    $respAX["code"] = 0;
    $respAX["log"] = date("Y-m-d H:i:s");
    $respAX["data"] = "Esta academia ya está en el sistema";
    echo json_encode($respAX);
}
?>