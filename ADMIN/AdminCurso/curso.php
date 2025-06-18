<?php
include 'configBD.php';

if (!$conexion) {
    http_response_code(500);
    echo json_encode(["error" => "Error de conexión"]);
    exit;
}
date_default_timezone_set("America/Mexico_City");
$grupo = $_REQUEST["grupo"];
$materia = $_REQUEST["materia"];

$sql0 = "SELECT * FROM grupo WHERE NombreGru = '$grupo'";
$res0 = mysqli_query($conexion, $sql0);
if ($res0->num_rows == 1) {
    $res0->data_seek(0);
    $idgru = $res0->fetch_assoc()['IDGrupo'];
    $sql01 = "SELECT * FROM materia WHERE NombMateria = '$materia'";
    $res01 = mysqli_query($conexion, $sql01);
    if ($res01->num_rows == 1) {
        $res01->data_seek(0);
        $idmat = $res01->fetch_assoc()['IDMateria'];
        $sql1 = "SELECT * FROM curso WHERE IdGrupo= '$idgru' && IdMateria= '$idmat'";
        $existe = mysqli_query($conexion, $sql1);
        if ($existe->num_rows == 0) {
            $sql3 = "INSERT INTO curso (Estatus, IdGrupo, IdMateria) VALUES (1, '$idgru', '$idmat')";
            $res2 = mysqli_query($conexion, $sql3);
            if ($res2) {
                $respAX["code"] = 1;
                $respAX["log"] = date("Y-m-d H:i:s");
                $respAX["data"] = "Se registró el curso de la materia: " . $materia . " en el grupo " . $grupo;
                echo json_encode($respAX);
            } else {
                $respAX["code"] = 0;
                $respAX["log"] = date("Y-m-d H:i:s");
                $respAX["data"] = "No fue posible ingresar este curso";
                echo json_encode($respAX);
            }

        } else {
            $respAX["code"] = 0;
            $respAX["log"] = date("Y-m-d H:i:s");
            $respAX["data"] = "Este curso ya está en el sistema";
            echo json_encode($respAX);
        }
    } else {
        $respAX["code"] = 0;
        $respAX["log"] = date("Y-m-d H:i:s");
        $respAX["data"] = "La materia no es válida";
        echo json_encode($respAX);
    }

} else {

    $respAX["code"] = 0;
    $respAX["log"] = date("Y-m-d H:i:s");
    $respAX["data"] = "El grupo no es válido";
    echo json_encode($respAX);
}

?>