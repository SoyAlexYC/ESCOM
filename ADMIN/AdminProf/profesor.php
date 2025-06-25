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
$horas = $_REQUEST["horas"];

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
                $sqlh = "SELECT * FROM horario order by IDHorario desc LIMIT 1";
                $resh = mysqli_query($conexion, $sqlh);
                if ($resh->num_rows == 1) {
                    $resh->data_seek(0);
                    $idh = $resh->fetch_assoc()['IDHorario'];
                    $hori = $horas[0];
                    $horf = $horas[1];
                    $flag = 0;
                    for ($i = $hori; $i <= $horf; $i++) {
                        if ($flag == 0) {
                            for ($j = 1; $j <= 5; $j++) {
                                if ($flag == 0) {
                                    $sql5 = "INSERT INTO espacio (Detalles, Estatus, IdHorario, IdClase, IdDia, IdHora) VALUES ('sin clase', 1,'$idh', NULL, '$j', '$i')";
                                    $res5 = mysqli_query($conexion, $sql5);
                                    if (!$res5) {
                                        $flag = 1;
                                    }
                                }

                            }

                        }
                    }
                    if ($flag == 0) {
                        $respAX["code"] = 1;
                        $respAX["log"] = date("Y-m-d H:i:s");
                        $respAX["msj"] = "Se registró al profesor: " . $nombre . " " . $apep . " " . $apem . ", en el cubiculo: " . $cub . " y en la academia: " . $aca;
                        echo json_encode($respAX);
                    } else {
                    }
                } else {
                    $respAX["code"] = 1;
                    $respAX["log"] = date("Y-m-d H:i:s");
                    $respAX["msj"] = "Se registró al profesor: " . $nombre . " " . $apep . " " . $apem . ", pero su jornada deberá crearse manualmente, se logró insertar horario,  consultar manual.";
                    echo json_encode($respAX);
                }
            } else {
                $respAX["code"] = 1;
                $respAX["log"] = date("Y-m-d H:i:s");
                $respAX["msj"] = "Se registró al profesor: " . $nombre . " " . $apep . " " . $apem . ", pero su horario deberá crearse manualmente, consultar manual.";
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