<?php
date_default_timezone_set("America/Mexico_City");
$nombre = $_REQUEST["nombre"];
$respAX = [];
//manera 1 de conectar 
$mysqli = new mysqli("localhost", "ale", "ola", "escom");
if ($mysqli->connect_errno) {
    $respAX["code"] = 0;
    $respAX["log"] = date("Y-m-d H:i:s");
    $respAX["data"] = "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    echo json_encode($respAX);
} else {
    $existe = $mysqli->query("SELECT * FROM materia WHERE NombMateria = '$nombre'");
    if ($existe->num_rows == 0) {
            $ins = $mysqli->query("INSERT INTO materia (NombMateria) VALUES ('$nombre');");
            $respAX["code"] = 1;
            $respAX["log"] = date("Y-m-d H:i:s");
            $respAX["data"] = "Se registró la materia: " . $nombre;
            echo json_encode($respAX);
    } else {
        $respAX["code"] = 0;
        $respAX["log"] = date("Y-m-d H:i:s");
        $respAX["data"] = "Esta materia ya está en el sistema";
        echo json_encode($respAX);
    }
}
?>