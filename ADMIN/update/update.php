<?php
include 'configBD.php';

if (!$conexion) {
  http_response_code(500);
  echo json_encode(["error" => "Error de conexión"]);
  exit;
}





// Consulta 1: datos del profesor
$sql = "SELECT * FROM profesor";
$result = $conexion->query($sql);

// Consulta 2: datos de la materia
$sqlMat = "SELECT * FROM materia";
$resultMat = $conexion->query($sqlMat);

// Consulta 3: datos del alumno
$sqlAlu = "SELECT * FROM alumno";
$resultAlu = $conexion->query($sqlAlu);

$respuesta = [
  'prof' => [],
  'mat' => [],
  'alu' => []
];

// Guardar datos de profesores
while ($row = $result->fetch_assoc()) {
  $respuesta['prof'][] = [
    'IDProfesor' => $row['IDProfesor'],
    'NombrePro' => $row['NombrePro'],
    'PaternoPro' => $row['PaternoPro'],
    'MaternoPro' => $row['MaternoPro'],
    'Cubiculo' => $row['Cubiculo'],
    'puesto' => $row['puesto']
  ];
}

// Guardar datos de materias
while ($rowMat = $resultMat->fetch_assoc()) {
  $respuesta['mat'][] = [
    'NombMateria' => $rowMat['NombMateria']
    
  ];
}

// Guardar datos de alumnos
while ($rowAlu = $resultAlu->fetch_assoc()) {
  $respuesta['alu'][] = [
    'NombreAlu' => $rowAlu['NombreAlu'],
    'PaternoAlu' => $rowAlu['PaternoAlu'],
    'MaternoAlu' => $rowAlu['MaternoAlu'],
    'boleta' => $rowAlu['boleta'],
    'contraseña' => $rowAlu['contraseña']
  ];
}

header('Content-Type: application/json');
echo json_encode($respuesta);

$conexion->close();

?>
