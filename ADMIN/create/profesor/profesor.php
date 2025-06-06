<?php
date_default_timezone_set("America/Mexico_City");
$nombre = $_REQUEST["nombre"];
$apep = $_REQUEST["apep"];
$apem = $_REQUEST["apem"];
$cub = $_REQUEST["cub"];
$respAX = [];
//manera 1 de conectar 
$mysqli = new mysqli("localhost", "ale", "ola", "escom");
if ($mysqli->connect_errno) {
    $respAX["code"] = 0;
    $respAX["log"] = date("Y-m-d H:i:s");
    $respAX["data"] = "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    echo json_encode($respAX);
} else {
    $existe = $mysqli->query("SELECT * FROM profesor WHERE nombrepro = '$nombre' and paternopro = '$apep' and maternopro = '$apem'");
    if ($existe->num_rows == 0) {
            $ins = $mysqli->query("INSERT INTO profesor (NombrePro, PaternoPro, MaternoPro, Cubiculo) VALUES ('$nombre', '$apep', '$apem', '$cub');");
            $respAX["code"] = 1;
            $respAX["log"] = date("Y-m-d H:i:s");
            $respAX["data"] = "Se registró al profesor: " . $nombre . " " . $apep . " " . $apem . ", en el cubiculo: " . $cub;
            echo json_encode($respAX);
    } else {
        $respAX["code"] = 0;
        $respAX["log"] = date("Y-m-d H:i:s");
        $respAX["data"] = "Este profesor ya está en el sistema";
        echo json_encode($respAX);
    }
}
?>