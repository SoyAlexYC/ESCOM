<?php
include 'configBD.php';
if (!$conexion) {
    $respAX["code"] = 0;
    $respAX["log"] = date("Y-m-d H:i:s");
    $infMat = [];
    $infMat[] = "No hay conexion";
    $respAX["data"] = $infMat;
    echo json_encode($respAX);
    exit;
}
$sql1 = "SELECT COUNT(P.IDProfesor) as act,p.IDProfesor,p.NombrePro,p.PaternoPro,p.MaternoPro FROM profesor p inner join horario h on h.IdProfesor =p.IDProfesor inner join espacio e on e.IdHorario = h.IDHorario  WHERE e.IdClase IS NULL GROUP BY p.IDProfesor having COUNT(P.IDProfesor) >= 3 ORDER BY act DESC;";
$resultado1 = mysqli_query($conexion, $sql1);
$respAX = [];
if ($resultado1->num_rows != 0) {
    $respAX["code"] = 1;
    $respAX["log"] = date("Y-m-d H:i:s");
    $infMat = [];
    while ($fila = mysqli_fetch_assoc($resultado1)) {
        $infMat[] = $fila;
    }
    $respAX["data"] = $infMat;
    echo json_encode($respAX);
} else {
    $respAX["code"] = 0;
    $respAX["log"] = date("Y-m-d H:i:s");
    $infMat = [];
    $infMat[] = "No hay profesores con horario disponible";
    $respAX["data"] = $infMat;
    echo json_encode($respAX);
}
?>