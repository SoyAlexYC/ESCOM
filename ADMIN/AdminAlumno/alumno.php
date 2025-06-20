<?php
include 'configBD.php';

if (!$conexion) {
    http_response_code(500);
    echo json_encode(["error" => "Error de conexión"]);
    exit;
}
date_default_timezone_set("America/Mexico_City");
$nombre = $_REQUEST["nombre"];
$apep = $_REQUEST["apep"];
$apem = $_REQUEST["apem"];
$bol = $_REQUEST["bol"];
$con = $_REQUEST["con"];

$sql1 = "SELECT * FROM alumno WHERE NombreAlu = '$nombre' and PaternoAlu = '$apep' and MaternoAlu = '$apem' and Boleta = '$bol'";
$respAX = [];
$existe = mysqli_query($conexion, $sql1);
if ($existe->num_rows == 0) {
        $sql3 = "INSERT INTO alumno (NombreAlu, PaternoAlu, MaternoAlu, Boleta, Estatus, Contrasena) VALUES ('$nombre', '$apep', '$apem', '$bol', 1, '$con')";
        $res2 = mysqli_query($conexion, $sql3);
        if ($res2) {
            $respAX["code"] = 1;
            $respAX["log"] = date("Y-m-d H:i:s");
            $respAX["data"] = "Se registró al alumno: " . $nombre . " " . $apep . " " . $apem . ", con boleta: " . $bol;
            echo json_encode($respAX);
        } else {
            $respAX["code"] = 0;
            $respAX["log"] = date("Y-m-d H:i:s");
            $respAX["data"] = "No fue posible ingresar este profesor";
            echo json_encode($respAX);
        }
} else {
    $respAX["code"] = 0;
    $respAX["log"] = date("Y-m-d H:i:s");
    $respAX["data"] = "Este alumno ya está en el sistema";
    echo json_encode($respAX);
}
?>