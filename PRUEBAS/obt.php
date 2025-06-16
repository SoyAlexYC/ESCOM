<?php
include 'conexion_DB.php';

$sql = "SELECT * FROM CLASE"
$resultado = $conn->query($sql);

$clases = array();
while($fila = $resultado->fetch_assoc()) {
    $clases[] = $fila;
}

echo json_encode($clase);
?>