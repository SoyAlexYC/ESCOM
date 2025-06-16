<?php
include '../../HTML/configBD.php';
header('Content-Type: application/json');

ini_set('display_errors', 1);
error_reporting(E_ALL);

if (!$conexion) {
  http_response_code(500);
  echo json_encode(["error" => "Error de conexión"]);
  exit;
}

// Consulta 1: datos del profesor
$sqlPro = "SELECT * FROM profesor";
$resultPro = mysqli_query($conexion, $sqlPro);

// Consulta 2: datos de la materia
$sqlMat = "SELECT * FROM materia";
$resultMat = mysqli_query($conexion, $sqlMat);

// Consulta 3: datos del alumno
$sqlAlu = "SELECT * FROM alumno";
$resultAlu = mysqli_query($conexion, $sqlAlu);

$respAX[];
$respAX["code"] = 1;
$respAX["log"] = date("Y-m-d H:i:s");

$dataProf=[];
$dataMat=[];
$dataAlu=[];

// Guardar datos de profesores
while ($rowPro = $resultPro->fetch_assoc()) {
  $dataProf[] = [
    'IDProfesor' => $rowPro['IDProfesor'],
    'NombrePro' => $rowPro['NombrePro'],
    'PaternoPro' => $rowPro['PaternoPro'],
    'MaternoPro' => $rowPro['MaternoPro'],
    'Cubiculo' => $rowPro['Cubiculo'],
    'puesto' => $rowPro['puesto']
  ];
}


// Guardar datos de materias
while ($rowMat = $resultMat->fetch_assoc()) {
  $dataMat[] = [
    'NombMateria' => $rowMat['NombMateria']
    
  ];
}


// Guardar datos de alumnos
while ($rowAlu = $resultAlu->fetch_assoc()) {
  $dataAlu[] = [
    'NombreAlu' => $rowAlu['NombreAlu'],
    'PaternoAlu' => $rowAlu['PaternoAlu'],
    'MaternoAlu' => $rowAlu['MaternoAlu'],
    'boleta' => $rowAlu['boleta'],
    'contraseña' => $rowAlu['contraseña']
  ];
}
$respAX["dataPro"] = $dataProf;
$respAX["dataMat"] = $dataMat;
$respAX["dataAlu"] = $dataMat;

echo json_encode($respAX);

$conexion->close();

?>
