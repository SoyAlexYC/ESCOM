<?php
include 'configBD.php';

if (!$conexion) {
    http_response_code(500);
    echo json_encode(["error" => "Error de conexión"]);
    exit;
}
date_default_timezone_set("America/Mexico_City");
$nombre = $_REQUEST["nombre"];
$tipo = $_REQUEST["tipo"];

$sql1 = "SELECT * FROM salon WHERE nomsalon = '$nombre'";
$respAX = [];
$existe = mysqli_query($conexion, $sql1);
if ($existe->num_rows == 0) {
    $sql2 = "SELECT * FROM tipo WHERE NomTipo = '$tipo'";
    $res1 = mysqli_query($conexion, $sql2);
    if ($res1->num_rows == 1) {
        $res1->data_seek(0);
        $idtipo = $res1->fetch_assoc()['IDTipo'];
        $sql3 = "INSERT INTO salon (NomSalon, Estatus, IdTipo) VALUES ('$nombre', 1, '$idtipo')";
        $res2 = mysqli_query($conexion, $sql3);
        if ($res2) {
            $respAX["code"] = 1;
            $respAX["log"] = date("Y-m-d H:i:s");
            $respAX["data"] = "Se registró al salon: " . $nombre . ", de tipo: " . $tipo;
            echo json_encode($respAX);
        } else {
            $respAX["code"] = 0;
            $respAX["log"] = date("Y-m-d H:i:s");
            $respAX["data"] = "No fue posible ingresar este salon";
            echo json_encode($respAX);
        }
    } else {
        $respAX["code"] = 0;
        $respAX["log"] = date("Y-m-d H:i:s");
        $respAX["data"] = "El tipo no es válido";
        echo json_encode($respAX);
    }
} else {
    $respAX["code"] = 0;
    $respAX["log"] = date("Y-m-d H:i:s");
    $respAX["data"] = "Este salon ya está en el sistema";
    echo json_encode($respAX);
}
?>