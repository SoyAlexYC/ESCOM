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
$cub = $_REQUEST["cub"];
$aca = $_REQUEST["aca"];

$sql1 = "SELECT * FROM profesor WHERE nombrepro = '$nombre' and paternopro = '$apep' and maternopro = '$apem'";
$respAX = [];
$existe = mysqli_query($conexion, $sql1);
if ($existe->num_rows == 0) {
    $sql2 = "SELECT * FROM academia WHERE NomAcademia = '$aca'";
    $res1 = mysqli_query($conexion, $sql2);
    if ($res1->num_rows == 1) {
        $res1->data_seek(0);
        $idaca = $res1->fetch_assoc()['IDAcademia'];
        $sql3 = "INSERT INTO profesor (NombrePro, PaternoPro, MaternoPro, Cubiculo, Estatus, IdAcademia) VALUES ('$nombre', '$apep', '$apem', '$cub', 1, '$idaca')";
        $res2 = mysqli_query($conexion, $sql3);
        if ($res2) {
            $sqls = "SELECT * FROM semestre_corriente where Estatus='1'";
            $res3 = mysqli_query($conexion, $sqls);
            $res3->data_seek(0);
            $idsem = $res3->fetch_assoc()['NomSemestre'];
            $sqlp = "SELECT * FROM profesor order by IDProfesor desc LIMIT 1";
            $resp = mysqli_query($conexion, $sqlp);
            $resp->data_seek(0);
            $idp = $resp->fetch_assoc()['IDProfesor'];
            $sql4 = "INSERT INTO horario (Semestre, Estatus, IdProfesor) VALUES ('$idsem', 1, '$idp')";
            $res4 = mysqli_query($conexion, $sql4);
            if ($res4) {
                $respAX["code"] = 1;
                $respAX["log"] = date("Y-m-d H:i:s");
                $respAX["data"] = "Se registró al profesor: " . $nombre . " " . $apep . " " . $apem . ", en el cubiculo: " . $cub . " y en la academia: " . $aca;
                echo json_encode($respAX);
            } else {
                $respAX["code"] = 1;
                $respAX["log"] = date("Y-m-d H:i:s");
                $respAX["data"] = "Se registró al profesor: " . $nombre . " " . $apep . " " . $apem . ", pero su horario deberá crearse manualmente, consultar manual.";
                echo json_encode($respAX);
            }
        } else {
            $respAX["code"] = 0;
            $respAX["log"] = date("Y-m-d H:i:s");
            $respAX["data"] = "No fue posible ingresar este profesor";
            echo json_encode($respAX);
        }
    } else {
        $respAX["code"] = 0;
        $respAX["log"] = date("Y-m-d H:i:s");
        $respAX["data"] = "La academia no es válida";
        echo json_encode($respAX);
    }
} else {
    $respAX["code"] = 0;
    $respAX["log"] = date("Y-m-d H:i:s");
    $respAX["data"] = "Este profesor ya está en el sistema";
    echo json_encode($respAX);
}
?>