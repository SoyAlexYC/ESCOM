<?php
date_default_timezone_set("America/Mexico_City");
$materia = $_REQUEST["materia"];
$grupo = $_REQUEST["grupo"];
$respAX = [];
//manera 1 de conectar 
$mysqli = new mysqli("localhost", "ale", "ola", "escom");
if ($mysqli->connect_errno) {
    $respAX["code"] = 0;
    $respAX["log"] = date("Y-m-d H:i:s");
    $respAX["data"] = "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    echo json_encode($respAX);
} else {
    $grupo1 = $mysqli->query("SELECT IDGrupo FROM grupo WHERE NombreGru='$grupo'");
    $materia1 = $mysqli->query("SELECT IDMateria FROM materia WHERE NombMateria='$materia'"); //muestras todos y ps ya ves si seleccionas uno xdd.
    if ($grupo1->num_rows == 0 || $materia1->num_rows == 0) {
        $respAX["code"] = 0;
        $respAX["log"] = date("Y-m-d H:i:s");
        $respAX["data"] = "Materia y/o grupo no válido(s)";
        echo json_encode($respAX);
    } else {
        $grupo1->data_seek(0);
        $idg = $grupo1->fetch_assoc()['IDGrupo'];
        $materia1->data_seek(0);
        $idm = $materia1->fetch_assoc()['IDMateria'];
        $nombre = $mysqli->query("SELECT * FROM curso WHERE IdGrupo= '$idg' && IdMateria= '$idm'");
        if ($nombre->num_rows == 0) {
            $nombre = $mysqli->query("SELECT semestre FROM semestre_corriente WHERE estatus='1'");
            $nombre->data_seek(0);
            $sem = $nombre->fetch_assoc()['semestre'];
            $nombre = $mysqli->query("INSERT INTO curso (SemestrCorriente, IdGrupo, IdMateria) VALUES ('$sem', '$idg', '$idm');");
            $respAX["code"] = 1;
            $respAX["log"] = date("Y-m-d H:i:s");
            $respAX["data"] = "Se creó el curso de la materia: " . $materia . ", en el grupo: " . $grupo;
            echo json_encode($respAX);
        } else {
            $respAX["code"] = 0;
            $respAX["log"] = date("Y-m-d H:i:s");
            $respAX["data"] = "Este grupo ya tienen curso de esta materia asginado";
            echo json_encode($respAX);
        }
    }
}
?>