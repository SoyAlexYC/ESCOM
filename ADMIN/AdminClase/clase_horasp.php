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
$prof = $_POST["prof"];
$sql1 = "SELECT hora.HoraIni,hora.HoraFin, d.NomDia, e.IDEspacio FROM hora inner join espacio e on hora.IDHora=e.IdHora inner join dia d on d.IDDia=e.IdDia inner join horario h on e.IdHorario = h.IDHorario inner join profesor p on h.IdProfesor =p.IDProfesor WHERE p.IDProfesor = '$prof';";
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