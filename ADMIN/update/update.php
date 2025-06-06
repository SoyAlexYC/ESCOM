<?php
$conn = mysqli_connect("localhost", "admin", "123456", "escom");

if (!$conn) {
  http_response_code(500);
  echo json_encode(["error" => "Error de conexión"]);
  exit;
}





// Consulta 1: datos del profesor
$sql = "SELECT * FROM profesor";
$result = $conn->query($sql);

// Consulta 2: datos de la materia
$sqlMat = "SELECT * FROM materia";
$resultMat = $conn->query($sqlMat);

// Consulta 3: datos del alumno
$sqlAlu = "SELECT * FROM alumno";
$resultAlu = $conn->query($sqlAlu);

$respuesta = [
  'prof' => [],
  'mat' => [],
  'alu' => []
];

// Guardar datos de profesores
while ($row = $result->fetch_assoc()) {
  $respuesta['prof'][] = [
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

//////////seccion del update 
/*
$sqlMod ="UPDATE profesor SET $campo = ? WHERE IDProfesor=?";
$stm = $conn->prepare($sqlMod); 

$stm->bind_param("si",$valor,$IDPRofesor)
$stm-> execute;
if($stm=affected_rows> 0){
echo "actualizado";
}else{
echo "sin cambios";
}*/
$conn->close();

?>
