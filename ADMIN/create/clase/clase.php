<?php
date_default_timezone_set("America/Mexico_City");
$curso = $_REQUEST["curso"];
$salon = $_REQUEST["salon"];
$tipoc = "lab"; //esto deberia de venir desde request, post jajajas
$respAX = [];
//manera 1 de conectar 
$mysqli = new mysqli("localhost", "ale", "ola", "escom");
if ($mysqli->connect_errno) {
    $respAX["code"] = 0;
    $respAX["log"] = date("Y-m-d H:i:s");
    $respAX["data"] = "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    echo json_encode($respAX);
} else {
    $grupo1 = $mysqli->query("SELECT IDCurso FROM curso WHERE NombreGru='$curso'");
    $materia1 = $mysqli->query("SELECT IDSalon FROM salon WHERE NombMateria='$salon'"); //muestras todos y ps ya ves si seleccionas uno xdd.
    if ($grupo1->num_rows == 0 || $grupo1->num_rows == 0) {
        $respAX["code"] = 0;
        $respAX["log"] = date("Y-m-d H:i:s");
        $respAX["data"] = "Materia y/o grupo no válido(s)";
        echo json_encode($respAX);
    } else {
        $curso1->data_seek(0);
        $idc = $grupo1->fetch_assoc()['IDCurso'];
        $salon1->data_seek(0);
        $ids = $materia1->fetch_assoc()['IDSalon'];
        $nombre = $mysqli->query("SELECT * FROM clase WHERE IdCurso= '$idc' && IdSalon= '$ids'");
        $numclas = 3; //esto deberia de ser desde la tabla de materia, pero vemosss
        if ($nombre->num_rows > $numclas) {
            $respAX["code"] = 0;
            $respAX["log"] = date("Y-m-d H:i:s");
            $respAX["data"] = "Este curso ya tiene todas sus clases asignadas";
            echo json_encode($respAX);
        } else {
            $nombre = $mysqli->query("INSERT INTO clase (TipoClase, IdCurso, IdSalon) VALUES ('$tipoc', '$idc', '$ids');");
            $respAX["code"] = 1;
            $respAX["log"] = date("Y-m-d H:i:s");
            $respAX["data"] = "Se creó la clase del curso: " . $curso . ", en el salón: " . $salon;
            echo json_encode($respAX);
        }
    }
}
?>