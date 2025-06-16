<?php
include '../../HTML/configBD.php';
header('Content-Type: application/json');

if ($conexion->connect_error) {
  http_response_code(500);
  echo json_encode(["status" => "error", "msg" => "Error de conexión"]);
  exit;
}

$id = $_POST['id'] ?? null;
$campo = $_POST['campo'] ?? null;
$valor = $_POST['valor'] ?? null;

// Validar campos permitidos
$permitidos = ['NombrePro', 'PaternoPro', 'MaternoPro', 'Cubiculo', 'puesto'];

if (!$id || !$campo || !in_array($campo, $permitidos)) {
  http_response_code(400);
  echo json_encode(["status" => "error", "msg" => "Datos inválidos"]);
  exit;
}

// Ejecutar actualización
$sql = "UPDATE profesor SET $campo = ? WHERE IDProfesor = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("si", $valor, $id);

if ($stmt->execute()) {
  echo json_encode(["status" => "ok", "msg" => "Actualizado correctamente"]);
} else {
  http_response_code(500);
  echo json_encode(["status" => "error", "msg" => "Error al actualizar"]);
}

$conexion->close();
