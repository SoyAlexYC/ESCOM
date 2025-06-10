<?php
$conexion = mysqli_connect("localhost", "admin", "123456", "escom");

if ($conexion->connect_error) {
  http_response_code(500);
  echo "Error de conexión";
  exit;
}

$id = $_POST['id'] ?? null;
$campo = $_POST['campo'] ?? null;
$valor = $_POST['valor'] ?? null;

// Campos permitidos para evitar inyecciones SQL
$permitidos = ['NombrePro', 'PaternoPro', 'MaternoPro', 'Cubiculo', 'puesto'];

if (!$id || !$campo || !in_array($campo, $permitidos)) {
  http_response_code(400);
  echo "Datos inválidos";
  exit;
}

// Construye SQL dinámicamente, pero solo con campo permitido
$sql = "UPDATE profesor SET $campo = ? WHERE IDProfesor = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("si", $valor, $id);

if ($stmt->execute()) {
  echo "Actualizado";
} else {
  http_response_code(500);
  echo "Error al actualizar";
}

$conexion->close();
