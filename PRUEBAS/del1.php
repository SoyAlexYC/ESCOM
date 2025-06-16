<?php

include 'conexion_DB.php'

$id = $_POST['id']
$sql = "DELETE FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "OK";
    } else {
        echo "Error al eliminar clase";
    }

    $stmt->close();
?>