<?php
$id = $_GET['id'];
echo "Perfil del profesor: " . htmlspecialchars($id);
// aquí podrías cargar datos desde una base de datos, por ejemplo
$conexion = mysqli_connect("localhost", "admin","123456", "escom");

$sql1 = "SELECT * FROM `profesor` WHERE IDProfesor = $id";
?>