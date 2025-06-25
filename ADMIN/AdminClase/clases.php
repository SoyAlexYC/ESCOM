<?php
include 'configBD.php';

if (!$conexion) {
    http_response_code(500);
    echo json_encode(["error" => "Error de conexión"]);
    exit;
}
date_default_timezone_set("America/Mexico_City");
$curso = $_REQUEST["curso"];
$salones = $_REQUEST["salones"];
$prof = $_REQUEST["prof"];
$horas = $_REQUEST["horas"];

$sql0 = "SELECT * FROM profesor WHERE IDProfesor = '$prof'";
$res0 = mysqli_query($conexion, $sql0);
if ($res0->num_rows == 1) {
    $sals = array();
    $flag = 0;
    foreach ($salones as $salon) {
        if ($flag == 0) {
            $sql01 = "SELECT * FROM salon WHERE NomSalon = '$salon'";
            $res01 = mysqli_query($conexion, $sql01);
            if ($res01->num_rows == 1) {
                $sals[] = $res01->fetch_assoc()['IDSalon'];
            } else {
                $flag = 1;
            }
        }
    }
    if ($flag == 0) {
        $hors = array();
        $flag = 0;
        foreach ($horas as $hora) {
            if ($flag == 0) {
                $sql02 = "SELECT * FROM espacio WHERE IDEspacio = '$hora'";
                $res02 = mysqli_query($conexion, $sql02);
                if ($res02->num_rows != 1) {
                    $flag = 1;
                }
            }
        }
        if ($flag == 0) {
            $sql03 = "SELECT * FROM curso WHERE IDCurso = '$curso'";
            $res03 = mysqli_query($conexion, $sql03);
            if ($res03->num_rows == 1) {
                $tam = count($sals);
                for ($i = 0; $i < $tam; $i++) {
                    if ($flag == 0) {
                        $sql1 = "INSERT INTO clase (Estatus, IdCurso, IdSalon) VALUES (1, '$curso', '$sals[$i]')";
                        $res1 = mysqli_query($conexion, $sql1);
                        if ($res1) {
                            $clase = mysqli_insert_id($conexion); //pal ultimo id insertado jajas
                            $sql3 = "UPDATE espacio SET IdClase='$clase', Detalles = 'clase' WHERE IDEspacio = '$horas[$i]'";
                            $res2 = mysqli_query($conexion, $sql3);
                        } else {
                            $flag = 1;
                        }
                    }
                }
                if ($flag == 0) {
                    $respAX["code"] = 1;
                    $respAX["log"] = date("Y-m-d H:i:s");
                    $respAX["data"] = "Se registraron las clases elaboradas";
                    echo json_encode($respAX);
                } else {
                    $respAX["code"] = 0;
                    $respAX["log"] = date("Y-m-d H:i:s");
                    $respAX["data"] = "No fue posible ingresar estas clases";
                    echo json_encode($respAX);
                }
            } else {
                $respAX["code"] = 0;
                $respAX["log"] = date("Y-m-d H:i:s");
                $respAX["data"] = "El curso no es válido";
                echo json_encode($respAX);
            }
        } else {
            $respAX["code"] = 0;
            $respAX["log"] = date("Y-m-d H:i:s");
            $respAX["data"] = "Los espacios no son válidos";
            echo json_encode($respAX);
        }
    } else {
        $respAX["code"] = 0;
        $respAX["log"] = date("Y-m-d H:i:s");
        $respAX["data"] = "Los salones no son válidos";
        echo json_encode($respAX);
    }

} else {

    $respAX["code"] = 0;
    $respAX["log"] = date("Y-m-d H:i:s");
    $respAX["data"] = "El profesor no es válido";
    echo json_encode($respAX);
}

?>